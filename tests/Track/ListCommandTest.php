<?php
namespace Tests\Track;

class ListCommandTest extends \Tests\TestCase
{
    public function testListTrack()
    {
        db()->save([
            'url' => 'http://example.com/list.html'
        ]);

        $command = $this->addCommand('Absszero\PSStore\Track\ListCommand');
        $tester = $this->executeCommand($command);

        $track = db()->select()[0];
        $this->assertContains($track['url'], $tester->getDisplay());
    }
}
