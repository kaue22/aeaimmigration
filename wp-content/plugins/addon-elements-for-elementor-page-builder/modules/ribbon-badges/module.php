<?php
namespace WTS_EAE\Modules\RibbonBadges;

use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use WTS_EAE\Classes\Helper;



class Module{
	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	private function __construct() {
		add_action( 'elementor/element/after_section_end',[ $this, 'add_fields'],10,3);

		add_action( 'elementor/frontend/section/before_render',[ $this, 'before_section_render'],10,1);
		add_action( 'elementor/frontend/column/before_render',[ $this, 'before_section_render'],10,1);

		add_action( 'elementor/section/print_template', [ $this, '_content_template'],10,2);
		add_action( 'elementor/column/print_template', [ $this, '_content_template'],10,2);


	}

	public function add_fields($element,$section_id, $args){

		if ( ('section' === $element->get_name() && 'section_background' === $section_id) || ('column' === $element->get_name() && 'section_style' === $section_id)) {
			$element->start_controls_section(
				'ribbons_badges',
				[
					'tab' => Controls_Manager::TAB_STYLE,
					'label' => __( 'EAE - Ribbons & Badges', 'wts-eae' ),
				]
			);

			$element->add_control(
				'ribbon_badges_layout_heading',
				[
					'type' => Controls_Manager::HEADING,
					'label' => 'Layout',
					'seperator' => 'after'
				]
			);

			$element->add_control(
				'ribbons_badges_switcher',
				[
					'label' => __('Enable Ribbons and Badges', 'wts-eae'),
					'type' => Controls_Manager::SWITCHER,
					'default' => '',
					'label_on' => __('Yes', 'wts-eae'),
					'label_off' => __('No', 'wts-eae'),
					'return_value' => 'yes',
					'prefix_class' => 'wts-eae-enable-ribbons-badges-',
					'render_type' => 'template'

				]
			);

			$element -> add_control(
				'ribbons_badges_type',
				[
					'label' => __(' Type ' , 'wts-eae'),
					'type' => Controls_Manager::SELECT,
					'options' =>
						[
							'ribbon' => __( 'Ribbon' , 'wts-eae'),
							'badge' =>__( 'Badge' , 'wts-eae'),
						],
					'default'=>'ribbon',
					'condition' => [
						'ribbons_badges_switcher!' => ''
					],
					'prefix_class' => 'wts-eae-badge-type-',

				]
			);

			$element->add_control(
				'ribbons_badges_title',
				[
					'label' => __('Title','ae-pro'),
					'type'  => Controls_Manager::TEXT,
					'placeholder' => __('Sale Badge Title','wts-eae'),
					'default' => __('Sale!','wts-eae'),
					'condition' => [
						'ribbons_badges_switcher!' => ''
					]
				]
			);

			$element->add_control(
				'ribbons_badges_horizontal_position',
				[
					'label' => __( 'Horizontal Position', 'wts-eae' ),
					'type' => Controls_Manager::CHOOSE,
					//'label_block' => true,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'wts-eae' ),
							'icon' => 'eicon-h-align-left',
						],
						'right' => [
							'title' => __( 'Right', 'wts-eae' ),
							'icon' => 'eicon-h-align-right',
						]

					],
					'prefix_class' => 'wts-eae-badge-h-',
					'default' => 'left',
					'condition' => [
						'ribbons_badges_switcher!' => ''
					]
				]
			);

			$element->add_control(
				'ribbons_badges_vertical_position',
				[
					'label' => __( 'Vertical Position', 'wts-eae' ),
					'type' => Controls_Manager::CHOOSE,
					//'label_block' => true,
					'options' => [
						'top' => [
							'title' => __( 'Top', 'wts-eae' ),
							'icon' => 'eicon-v-align-top',
						],
						'bottom' => [
							'title' => __( 'Bottom', 'wts-eae' ),
							'icon' => 'eicon-v-align-bottom',
						]

					],
					'prefix_class' => 'wts-eae-badge-v-',
					'default' => 'top',
					'condition' => [
						'ribbons_badges_type' => 'badge',
						'ribbons_badges_switcher!' => ''
					]
				]
			);

			$element->add_control(
				'ribbon_badges_style_heading',
				[
					'type' => Controls_Manager::HEADING,
					'label' => 'Style',
					'separator' => 'before',
					'condition' => [
						'ribbons_badges_switcher!' => ''
					]
				]
			);

			$helper = new Helper();

			$element->add_control(
				'wts-eae_ribbons_badges_bg_color',
				[
					'label' => __( 'Background Color', 'wts-eae' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_4,
					],
					'selectors' => [
						'{{WRAPPER}} > .wts-eae-ribbons-badges-wrapper span.wts-eae-ribbons-badges-inner' => 'background-color: {{VALUE}} !important;',
					],
					'condition' => [
						'ribbons_badges_switcher!' => ''
					]
				]
			);


			$ribbon_distance_transform = is_rtl() ? 'translateY(-50%) translateX({{SIZE}}{{UNIT}}) rotate(-45deg)' : 'translateY(-50%) translateX(-50%) translateX({{SIZE}}{{UNIT}}) rotate(-45deg)';

			$element->add_responsive_control(
				'wts-eae_ribbons_badges_distance',
				[
					'label' => __( 'Distance', 'wts-eae' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 50,
						],
					],
					'selectors' => [
						'{{WRAPPER}} > .wts-eae-ribbons-badges-wrapper span.wts-eae-ribbons-badges-inner' => 'margin-top: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}}.wts-eae-badge-type-ribbon > .wts-eae-ribbons-badges-wrapper span.wts-eae-ribbons-badges-inner' => 'transform: ' . $ribbon_distance_transform,
					],
					'condition' => [
						'ribbons_badges_type' => 'ribbon',
						'ribbons_badges_switcher!' => ''
					]
				]
			);

			$element->add_responsive_control(
				'wts-eae_ribbons_badges_size',
				[
					'label' => __( 'Size', 'wts-eae' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'em', 'px' ],
					'default' => [
						'unit' => 'em',
					],
					'tablet_default' => [
						'unit' => 'em',
					],
					'mobile_default' => [
						'unit' => 'em',
					],
					'range' => [
						'em' => [
							'min' => 0,
							'max' => 25,
							'step' => 0.1
						],
					],
					'selectors' => [
						'{{WRAPPER}} > .wts-eae-ribbons-badges-wrapper span.wts-eae-ribbons-badges-inner' => 'min-height: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}}; line-height: {{SIZE}};',
					],
					'condition' => [
						'ribbons_badges_type' => 'badge',
						'ribbons_badges_switcher!' => ''
					]
				]
			);

			$element->add_control(
				'wts-eae_ribbons_badges_text_color',
				[
					'label' => __( 'Text Color', 'wts-eae' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} > .wts-eae-ribbons-badges-wrapper span.wts-eae-ribbons-badges-inner' => 'color: {{VALUE}}',
					],
					'condition' => [
						'ribbons_badges_switcher!' => ''
					]
				]
			);

			$element->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'wts-eae_ribbons_badges_typography',
					'selector' => '{{WRAPPER}} > .wts-eae-ribbons-badges-wrapper span.wts-eae-ribbons-badges-inner',
					'scheme' => Scheme_Typography::TYPOGRAPHY_4,
					'condition' => [
						'ribbons_badges_switcher!' => ''
					]
				]
			);


			$helper->box_model_controls($element,[
				'name' => 'badge_style',
				'label' => __('Badge','wts-eae'),
				'border' => true,
				'border-radius' => true,
				'margin' => true,
				'padding' => true,
				'box-shadow' => true,
				'selector' => '{{WRAPPER}} > .wts-eae-ribbons-badges-wrapper span.wts-eae-ribbons-badges-inner',
			]);

			$element->end_controls_section();
		}
	}

	public function before_section_render(\Elementor\Element_Base $element){
		if($element->get_name() != 'section' && $element->get_name() != 'column'){
			return;
		}
		$settings = $element->get_settings();

		if($settings['ribbons_badges_switcher'] == 'yes'){
			$element->add_render_attribute('_wrapper', 'data-wts-eae-rb-text', $settings['ribbons_badges_title']);
		}

		?>
	<?php }

	function _content_template($template,$widget){
		if($widget->get_name() != 'section' && $widget->get_name() != 'column'){
			return $template;
		}

		$old_template = $template;
		ob_start();
		?>
		<?php
			if($widget->get_name()  == 'section'){ ?>
				<#
				if(settings.ribbons_badges_switcher == 'yes'){
					view.addRenderAttribute( 'element-type', 'class', 'wts-eae-ribbons-badges-section-yes' );
				view.addRenderAttribute( 'element-type', 'data-text',  settings.ribbons_badges_title);
				}

				#>
			<?php }
		?>
		<?php
		if($widget->get_name()  == 'column'){ ?>
			<#

			if(settings.ribbons_badges_switcher == 'yes'){
				view.addRenderAttribute( 'element-type', 'class', 'wts-eae-ribbons-badges-column-yes' );
			view.addRenderAttribute( 'element-type', 'data-text',  settings.ribbons_badges_title);
			}

			#>
		<?php }
		?>

			<div {{{view.getRenderAttributeString('element-type')}}}></div>
<!--		<#-->
<!---->
<!--		view.addRenderAttribute( 'element-type', 'class', 'wts-eae-ribbons-badges-inner' );-->
<!---->
<!--		#>-->

<!--		<div class="wts-eae-ribbons-badges-wrapper">-->
<!--			<span {{{view.getRenderAttributeString('element-type')}}}>-->
<!--			{{ settings.ribbons_badges_title }}-->
<!--			</span>-->
<!--		</div>-->

		<?php
		$slider_content = ob_get_contents();
		ob_end_clean();
		$template = $slider_content.$old_template;
		return $template;
	}

}