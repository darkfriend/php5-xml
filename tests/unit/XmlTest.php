<?php 
class XmlTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected $encodeArray = array(
        'bar' => 'value bar',
        'bar2' => array(
            'value' => 'value bar2',
        ),
        'foo' => array(
            array(
                'value' => 'value foo',
            ),
            array(
                'value' => 'value foo2',
            ),
        ),
        'der' => array(
            '@attributes' => array(
                'at1' => 'at1val',
                'at2' => 'at2val',
            ),
            'cdata' => 'this is long text
multiline',
        ),
        'qpo' => array(
            '@attributes' => array(
                'channel' => '11',
            ),
            'value' => array(
                'sub-value' => array(
                    array(
                        '@attributes' => array(
                            'channel' => '11',
                        ),
                        'value'=>'val',
                    ),
                    array(
                        '@attributes' => array(
                            'channel' => '12',
                        ),
                        'value'=>'val2'
                    ),
                ),
            ),
        ),
        'mlp' => array(
            array(
                'value' => array(
                    'sub1' => array(
                        array(
                            'value' => array(
                                'sub2' => array(
                                    array(
                                        'value' => 'val'
                                    )
                                )
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );

    protected $resultArray = array(
        'bar' => array(
            array(
                'value' => 'value bar',
            )
        ),
        'bar2' => array(
            array(
                'value' => 'value bar2',
            )
        ),
        'foo' => array(
            array(
                'value' => 'value foo',
            ),
            array(
                'value' => 'value foo2',
            ),
        ),
        'der' => array(
            array(
                '@attributes' => array(
                    'at1' => 'at1val',
                    'at2' => 'at2val',
                ),
                'value' => 'this is long text
multiline',
            )
        ),
        'qpo' => array(
            array(
                '@attributes' => array(
                    'channel' => '11',
                ),
                'value' => array(
                    'sub-value' => array(
                        array(
                            '@attributes' => array(
                                'channel' => '11',
                            ),
                            'value'=>'val',
                        ),
                        array(
                            '@attributes' => array(
                                'channel' => '12',
                            ),
                            'value'=>'val2'
                        ),
                    ),
                ),
            )
        ),
        'mlp' => array(
            array(
                'value' => array(
                    'sub1' => array(
                        array(
                            'value' => array(
                                'sub2' => array(
                                    array(
                                        'value' => 'val'
                                    )
                                )
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );

    protected $xml = '<?xml version="1.0" encoding="utf-8"?>
<root><bar>value bar</bar><bar2>value bar2</bar2><foo>value foo</foo><foo>value foo2</foo><der at1="at1val" at2="at2val"><![CDATA[this is long text
multiline]]></der><qpo channel="11"><sub-value channel="11">val</sub-value><sub-value channel="12">val2</sub-value></qpo><mlp><sub1><sub2>val</sub2></sub1></mlp></root>
';

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testEncodeXml()
    {
        $xml = \darkfriend\helpers\Xml::encode($this->encodeArray);

        $this->assertEquals($xml, $this->xml);
    }

    public function testDecodeXml()
    {
        $this->assertTrue(
            \darkfriend\helpers\Xml::decode($this->xml) === $this->resultArray
        );
    }

    public function testEncodeDecodeXml()
    {
        $xml = \darkfriend\helpers\Xml::encode($this->encodeArray);
        $array = \darkfriend\helpers\Xml::decode($xml);

        $this->assertTrue($this->resultArray === $array);
    }
}