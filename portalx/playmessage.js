
    
    AudioPlayer.setup("player.swf", {  
        width: 290
    });

    function moo() {
        AudioPlayer.embed("player", {soundFile: "moo.mp3", autostart: 'yes'});  
    }

    function foo() {
        AudioPlayer.embed("player", {soundFile: "foo.mp3", autostart: 'yes'});  
    }
