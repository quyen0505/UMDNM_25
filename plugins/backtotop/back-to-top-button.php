<?php
/**
 * Plugin Name: Back To Top Button
 * Description: Thêm một nút quay về đầu trang (ẩn khi ở đầu trang).
 * Version: 1.0
 * Author: Quyền
 */

if (!defined('ABSPATH')) exit;

class Back_To_Top_Button {
    public function __construct() {
        add_action('wp_footer', [$this, 'render_button']);
    }

    public function render_button() {
        ?>
        <button id="backToTopBtn" title="Lên đầu trang">↑</button>
        <style>
        #backToTopBtn {
            display: none;
            position: fixed;
            bottom: 40px;
            right: 40px;
            z-index: 999999;
            background: #000;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 22px;
            cursor: pointer;
            opacity: 0.7;
            transition: all 0.3s;
        }
        #backToTopBtn:hover {
            opacity: 1;
            transform: scale(1.1);
        }
        </style>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const btn = document.getElementById("backToTopBtn");
            window.addEventListener("scroll", function() {
                btn.style.display = (window.scrollY > 200) ? "block" : "none";
            });
            btn.addEventListener("click", function() {
                window.scrollTo({ top: 0, behavior: "smooth" });
            });
        });
        </script>
        <?php
    }
}

new Back_To_Top_Button();