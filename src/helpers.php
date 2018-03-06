<?php

use BroQiang\LaravelMarkdown\MarkdownView;
/**
 * editor.md 富文本编辑器 css
 * 使用方法：{!! editormd_css() !!}
 */
if (!function_exists('editormd_css')) {
    function editormd_css()
    {
        return MarkdownView::editormdCss();
    }
}

if (!function_exists('editormd_js')) {
    function editormd_js()
    {
        return MarkdownView::editormdJs();
    }
}

if (!function_exists('markdown_preview_css')) {
    function markdown_preview_css()
    {
        return MarkdownView::markdownPreviewCss();
    }
}

if (!function_exists('markdown_preview_js')) {
    function markdown_preview_js()
    {
        return MarkdownView::markdownPreviewJs();
    }
}
