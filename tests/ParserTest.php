<?php

use PHPUnit\Framework\TestCase;
use Genert\BBCode\BBCode;

/**
 * Class ParserTest
 */
class ParserTest extends TestCase
{
    public function testParser()
    {
        $bbCode = new BBCode();

        $this->assertNotNull($bbCode);
    }

    public function testBBCodeParsing()
    {
        $bbCode = new BBCode();
        $tests = [
            ['input' => '[h1]Yolo[/h1]', 'excepted' => '<h1>Yolo</h1>'],
            ['input' => '[h2]Yolo[/h2]', 'excepted' => '<h2>Yolo</h2>'],
            ['input' => '[h3]Yolo[/h3]', 'excepted' => '<h3>Yolo</h3>'],
            ['input' => '[h4]Yolo[/h4]', 'excepted' => '<h4>Yolo</h4>'],
            ['input' => '[h5]Yolo[/h5]', 'excepted' => '<h5>Yolo</h5>'],
            ['input' => '[h6]Yolo[/h6]', 'excepted' => '<h6>Yolo</h6>'],
            ['input' => '[b]Yolo[/b]', 'excepted' => '<b>Yolo</b>'],
            ['input' => '[i]Yolo[/i]', 'excepted' => '<i>Yolo</i>'],
            ['input' => '[u]Yolo[/u]', 'excepted' => '<u>Yolo</u>'],
            ['input' => '[s]Yolo[/s]', 'excepted' => '<s>Yolo</s>'],
            ['input' => '[code]Yolo[/code]', 'excepted' => '<code>Yolo</code>'],
            ['input' => '[list]Yolo[/list]', 'excepted' => '<ul>Yolo</ul>'],
            ['input' => '[img]Yolo[/img]', 'excepted' => '<img src="Yolo">'],
            ['input' => '[table]Yolo[/table]', 'excepted' => '<table>Yolo</table>'],
            ['input' => '[tr]Yolo[/tr]', 'excepted' => '<tr>Yolo</tr>'],
            ['input' => '[td]Yolo[/td]', 'excepted' => '<td>Yolo</td>'],
        ];

        foreach ($tests as $test) {
            $this->assertEquals($test['excepted'], $bbCode->convertToHtml($test['input']));
        }
    }

    public function testHtmlReturnsCorrectBBCode()
    {
        $bbCode = new BBCode();
        $input = '
            <strong>bold</strong>
            <i>italic</i>
            <u>underline</u>
            <s>line through</s>
            <blockquote>quote</blockquote>
            <h1>lorem ipsum</h1>
            <h2>lorem ipsum</h2>
            <h3>lorem ipsum</h3>
            <h4>lorem ipsum</h4>
            <h5>lorem ipsum</h5>
            <h6>lorem ipsum</h6>
            <a href="http://www.example.com">http://www.example.com</a>
            <a href="http://www.example.com">example.com</a>
            <img src="http://example.com/logo.png">
            <ol>
                <li>Item 1</li>
                <li>Item 2</li>
                <li>Item 3</li>
            </ol>
            <code><?php echo \'Hello World\'; ?></code>
            <iframe width="560" height="315" src="//www.youtube.com/embed/pnGJXuHDoYw" frameborder="0" allowfullscreen></iframe>
            <ul>
                <li>Item 1</li>
                <li>Item 2</li>
                <li>Item 3</li>
            </ul>
            <table>
              <tr>
                <td>table 1</td>
                <td>table 2</td>
              </tr>
              <tr>
                <td>table 3</td>
                <td>table 4</td>
              </tr>
            </table>
        ';

        $output = '
            [b]bold[/b]
            [i]italic[/i]
            [u]underline[/u]
            [s]line through[/s]
            [quote]quote[/quote]
            [h1]lorem ipsum[/h1]
            [h2]lorem ipsum[/h2]
            [h3]lorem ipsum[/h3]
            [h4]lorem ipsum[/h4]
            [h5]lorem ipsum[/h5]
            [h6]lorem ipsum[/h6]
            [url=http://www.example.com]http://www.example.com[/url]
            [url=http://www.example.com]example.com[/url]
            [img]http://example.com/logo.png[/img]
            [list=1]
                [*]Item 1
                [*]Item 2
                [*]Item 3
            [/list]
            [code]<?php echo \'Hello World\'; ?>[/code]
            [youtube]pnGJXuHDoYw[/youtube]
            [list]
                [*]Item 1
                [*]Item 2
                [*]Item 3
            [/list]
            [table]
              [tr]
                [td]table 1[/td]
                [td]table 2[/td]
              [/tr]
              [tr]
                [td]table 3[/td]
                [td]table 4[/td]
              [/tr]
            [/table]
        ';

        $this->assertEquals($output, $bbCode->convertFromHtml($input));
    }

    public function testBBCodeReturnsCorrectHtml()
    {
        $bbCode = new BBCode();

        $input = '
            [b]bold[/b]
            [i]italic[/i]
            [u]underline[/u]
            [s]line through[/s]
            [quote]quote[/quote]
            [h1]lorem ipsum[/h1]
            [h2]lorem ipsum[/h2]
            [h3]lorem ipsum[/h3]
            [h4]lorem ipsum[/h4]
            [h5]lorem ipsum[/h5]
            [h6]lor[h6]em i[/h6]psum[/h6]
            [url=http://www.example.com]http://www.example.com[/url]
            [url=http://www.example.com]example.com[/url]
            [img]http://example.com/logo.png[/img]
            [list=1]
                [*]Item 1
                [*]Item 2
                [*]Item 3
            [/list]
            [code]<?php echo \'Hello World\'; ?>[/code]
            [youtube]pnGJXuHDoYw[/youtube]
            [list]
                [*]Item 1
                [*]Item 2
                [*]Item 3
            [/list]
        ';

        $output = '
            <b>bold</b>
            <i>italic</i>
            <u>underline</u>
            <s>line through</s>
            <blockquote>quote</blockquote>
            <h1>lorem ipsum</h1>
            <h2>lorem ipsum</h2>
            <h3>lorem ipsum</h3>
            <h4>lorem ipsum</h4>
            <h5>lorem ipsum</h5>
            <h6>lor<h6>em i</h6>psum</h6>
            <a href="http://www.example.com">http://www.example.com</a>
            <a href="http://www.example.com">example.com</a>
            <img src="http://example.com/logo.png">
            <ol>
                <li>Item 1</li>
                <li>Item 2</li>
                <li>Item 3</li>
            </ol>
            <code><?php echo \'Hello World\'; ?></code>
            <iframe width="560" height="315" src="//www.youtube-nocookie.com/embed/pnGJXuHDoYw" frameborder="0" allowfullscreen></iframe>
            <ul>
                <li>Item 1</li>
                <li>Item 2</li>
                <li>Item 3</li>
            </ul>
        ';

        $this->assertEquals($output, $bbCode->convertToHtml($input));
    }

    // https://github.com/Genert/bbcode/issues/2
    public function testCustomBulletsListBBCodeConversion()
    {
        $bbCode = new BBCode();

        $input = '
            [ul]
                [li]List item 1[/li]
                [li]List item 2[/li]
                [li]List item 3[/li]
            [/ul]
        ';

        $bbCode->addParser(
            'bullet_list',
            '/\[ul\](.*?)\[\/ul\]/s',
            '<ul>$1</ul>',
            '$1'
        );

        $bbCode->addParser(
            'list_item',
            '/\[li\](.*?)\[\/li\]/',
            '<li>$1</li>',
            '$1'
        );

        $output = '
            <ul>
                <li>List item 1</li>
                <li>List item 2</li>
                <li>List item 3</li>
            </ul>
        ';

        $this->assertEquals($output, $bbCode->convertToHtml($input));
    }

    public function testAddNewLineBBCodeConversion()
    {
        $bbCode = new BBCode();

        $bbCode->addLinebreakParser();

        $input = '[b]bold[/b]
            [i]italic[/i]
            [u]underline[/u]
            [s]line through[/s]';

        $output = trim('<b>bold</b><br />            <i>italic</i><br />            <u>underline</u><br />            <s>line through</s>');

        $this->assertEquals($output, $bbCode->convertToHtml($input));
    }

    public function testCaseSensitivity()
    {
        $bbCode = new BBCode();
        $input = $bbCode->convertToHtml('[B][I][U]Ran[b]d[/b]om text[/u][/I][/b]', BBCode::CASE_SENSITIVE);
        $output = '<b><i><u>Ran<b>d</b>om text</u></i></b>';

        $this->assertEquals(
            $input,
            $output
        );
    }

    public function testRemovalOfBBCodeTags()
    {
        $bbCode = new BBCode();

        $this->assertEquals(
            $bbCode->stripBBCodeTags('[u]What is this[/u]'),
            'What is this'
        );

        $this->assertEquals(
            $bbCode->stripBBCodeTags('Lo[b]rem[/b] dol[url=http://yolo.com]o[/url]r sit a[s]me[/s]t!'),
            'Lorem dolor sit amet!'
        );
    }

    public function testOnlyFunctionality()
    {
        $bbCode = new BBCode();

        $this->assertEquals(
            $bbCode->only('bold')->convertToHtml('[b]Bold[/b] [i]italic[/i]'),
            '<b>Bold</b> [i]italic[/i]'
        );

    }

    public function testExceptFunctionality()
    {
        $bbCode = new BBCode();

        $this->assertEquals(
            $bbCode->except('bold')->convertToHtml('[b]Bold[/b] [i]italic[/i]'),
            '[b]Bold[/b] <i>italic</i>'
        );
    }

    public function testAddParser()
    {
        $bbCode = new BBCode();

        $bbCode->addParser(
            'custom-link',
            '/\[link target\=(.*?)\](.*?)\[\/link\]/s',
            '<a href="$1">$2</a>',
            '$2'
        );

        $this->assertEquals(
            $bbCode->convertToHtml('[link target=http://www.example.com]Text to be displayed[/link].'),
            '<a href="http://www.example.com">Text to be displayed</a>.'
        );
    }

    public function testEdgeCases()
    {
        $bbCode = new BBCode();

        $this->assertEquals(
            $bbCode->convertFromHtml('This<strong> </strong><a href="http://genert.org"><strong>is</strong> <i>&lt;b&gt;test&lt;/b&gt;&lt;strong&gt;&lt;/strong&gt;&lt;strong</i>&gt;&lt;<u>/stro</u>ng&gt;</a>'),
            'This[b] [/b][url=http://genert.org][b]is[/b] [i]&lt;b&gt;test&lt;/b&gt;&lt;strong&gt;&lt;/strong&gt;&lt;strong[/i]&gt;&lt;[u]/stro[/u]ng&gt;[/url]'
        );
    }

    public function testExistingParserOverride()
    {
        $bbCode = new BBCode();

        $bbCode->addParser(
            'h1',
            '/\[h1\](.*?)\[\/h1\]/s',
            '<h3>$1</h3>',
            '$1'
        );

        $this->assertEquals(
            $bbCode->convertToHtml('[h1]Testing[/h1]'),
            '<h3>Testing</h3>'
        );
    }
}
