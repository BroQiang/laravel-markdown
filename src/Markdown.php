<?php
namespace BroQiang\LaravelMarkdown;

use League\HTMLToMarkdown\HtmlConverter;
use Parsedown;
use Purifier;

class Markdown
{
    protected $htmlParser;
    protected $markdownParser;
    public function __construct()
    {
        $this->htmlParser     = new HtmlConverter(['header_style' => 'atx']);
        $this->markdownParser = new Parsedown();
    }

    public function convertHtmlToMarkdown($html)
    {
        return $this->htmlParser->convert($html);
    }

    public function convertMarkdownToHtml($markdown)
    {
        $convertedHmtl = $this->markdownParser->setBreaksEnabled(true)->text($markdown);
        $convertedHmtl = Purifier::clean($convertedHmtl, 'user_topic_body');
        return $convertedHmtl;
    }
}
