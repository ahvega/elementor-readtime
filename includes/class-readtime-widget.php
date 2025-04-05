<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class ReadTime_Elementor_Widget extends Widget_Base {

    public function get_name() {
        return 'readtime_widget';
    }

    public function get_title() {
        return __('ReadTime Widget', 'readtime-widget');
    }

    public function get_icon() {
        return 'eicon-clock';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'readtime-widget'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_read_time',
            [
                'label' => __('Show Read Time', 'readtime-widget'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'readtime-widget'),
                'label_off' => __('Hide', 'readtime-widget'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_read_aloud',
            [
                'label' => __('Show Read Aloud', 'readtime-widget'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'readtime-widget'),
                'label_off' => __('Hide', 'readtime-widget'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_share',
            [
                'label' => __('Show Share', 'readtime-widget'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'readtime-widget'),
                'label_off' => __('Hide', 'readtime-widget'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'readtime-widget'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __('Icon Color', 'readtime-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .readtime-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        echo '<div class="readtime-widget">';

        if ('yes' === $settings['show_read_time']) {
            echo '<span class="readtime-icon"><i class="fas fa-stopwatch"></i> 5 min read</span>';
        }

        if ('yes' === $settings['show_read_aloud']) {
            echo '<span class="readtime-icon"><i class="fas fa-headphones"></i> Read Aloud</span>';
        }

        if ('yes' === $settings['show_share']) {
            echo '<span class="readtime-icon"><i class="fas fa-share-alt"></i> Share</span>';
        }

        echo '</div>';
    }
}