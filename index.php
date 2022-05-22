<?php 

abstract class Instrument {
    public static $count;

    public function __construct() {
        self::$count++;
    }

    public function printOutInstrimentProperties() {
        echo "Instrument name: {$this->instrumentName()}, <br/> Instrument type: {$this->instrumentType()}, <br/> {$this->hasStrings()} {$this->hasButtons()} {$this->hasPercussion()}, <br/> {$this->metalBase()} {$this->woodBase()} {$this->plasticBase()} <br/>";
    }

    abstract public function instrumentName();
    abstract public function instrumentType();
    abstract public function play();
    abstract public function tuneIn();
    abstract public function hasStrings();
    abstract public function hasButtons();
    abstract public function hasPercussion();
    abstract public function metalBase();
    abstract public function plasticBase();
    abstract public function woodBase();
}

class StringInstrument extends Instrument {
    public function instrumentName() {
        return '';
    }
    public function instrumentType() {
        return 'String instrument';
    }
    public function play() {
        return "Play";
    }
    public function tuneIn() {
        return "Tune in";
    }
    public function hasStrings() {
        return 'has strings';
    }
    public function hasButtons() {}

    public function hasPercussion() {}

    public function metalBase() {
    }
    public function plasticBase() {
    }
    public function woodBase() {
    }
}

class WindInstrument extends Instrument {
    public function instrumentName() {
        return '';
    }
    public function instrumentType() {
        return 'Wind instrument';
    }
    public function play() {
        return "Play";
    }
    public function tuneIn() {
        return "Tune in";
    }
    public function hasStrings() {}

    public function hasButtons() {
        return 'has buttons';
    }

    public function hasPercussion() {}

    public function metalBase() {
    }
    public function plasticBase() {
    }
    public function woodBase() {
    }
}

class PercussionInstrument extends Instrument {
    public function instrumentName() {
        return '';
    }
    public function instrumentType() {
        return 'Percussion instrument';
    }
    public function play() {
        return "Play";
    }
    public function tuneIn() {
        return "Tune in";
    }
    public function hasStrings() {
    }
    public function hasButtons() {}

    public function hasPercussion() {
        return 'has percussion';
    }
    public function metalBase() {
    }

    public function plasticBase() {
    }

    public function woodBase() {
    }
}

class Violin extends StringInstrument {
    public function instrumentName()
    {
        return 'Violin';
    }

    public function woodBase() {
        return 'wood base';
    }
}

class Viola extends StringInstrument {
    public function instrumentName()
    {
        return 'Viola';
    }

    public function woodBase() {
        return 'wood base';
    }
}

class Cello extends StringInstrument {
    public function instrumentName()
    {
        return 'Cello';
    }

    public function woodBase() {
        return 'wood base';
    }
}

class Harp extends StringInstrument {
    public function instrumentName()
    {
        return 'Harp';
    }

    public function metalBase() {
        return 'metal base';
    }
}

class Tuba extends WindInstrument {
    public function instrumentName()
    {
        return 'Tuba';
    }

    public function metalBase() {
        return 'metal base';
    }
}

class Truba extends WindInstrument {
    public function instrumentName()
    {
        return 'Truba';
    }

    public function metalBase() {
        return 'metal base';
    }
}

class Horn extends WindInstrument {
    public function instrumentName()
    {
        return 'Horn';
    }

    public function metalBase() {
        return 'metal base';
    }
}

class Flute extends WindInstrument {
    public function instrumentName()
    {
        return 'Flute';
    }

    public function metalBase() {
        return 'metal base';
    }
}

class Contrabass extends StringInstrument {
    public function instrumentName()
    {
        return 'Contrabass';
    }

    public function woodBase() {
        return 'wood base';
    }
}

class Durm extends PercussionInstrument {
    public function instrumentName()
    {
        return 'Drum';
    }

    public function woodBase() {
        return 'wood base';
    }
}

class Xylophone extends PercussionInstrument {
    public function instrumentName()
    {
        return 'Xylophone';
    }

    public function metalBase() {
        return 'metal base';
    }
}

class Saxophone extends WindInstrument {
    public function instrumentName()
    {
        return 'Saxophone';
    }

    public function metalBase() {
        return 'metal base';
    }
}

class Trombone extends WindInstrument {
    public function instrumentName()
    {
        return 'Trombone';
    }

    public function metalBase() {
        return 'metal base';
    }
}

class Timpan extends PercussionInstrument {
    public function instrumentName()
    {
        return 'Timpan';
    }

    public function woodBase() {
        return 'wood base';
    }
}

class Orchestra {
    private $orchestra = [];
    private static $instance;

    private function __construct() {}

    public static function getInstance() {
        if(self::$instance == null) {
            self::$instance = new Orchestra();
        }

        return self::$instance;
    }

    public function addInstrument(Instrument $instrument) {
        $this->orchestra[] = $instrument;
    }

    public function printOut() {
        echo "ORCHESTRA: <br/><br/><br/>";
        foreach ($this->orchestra as $instrument) {
            echo "{$instrument->printOutInstrimentProperties()}  -- ". $instrument->tuneIn()  ." -- " . $instrument->play()  . "<br/> *****************************<br/>";
        }
    }
}


$violin = new Violin();
$durm = new Durm();
$cello = new Cello();
$harp = new Harp();
$trombone = new Trombone();
$xylophone = new Xylophone();
$viola = new Viola();
$flute = new Flute();

echo "Number of created instruments: ";
echo Instrument::$count; echo "<br/>";

echo "******************************** <br/><br/><br/>";

$orchestra = Orchestra::getInstance();
$orchestra->addInstrument($violin);
$orchestra->addInstrument($durm);
$orchestra->addInstrument($cello);
// $orchestra->addInstrument($harp);
// $orchestra->addInstrument($trombone);
// $orchestra->addInstrument($xylophone);
// $orchestra->addInstrument($viola);
// $orchestra->addInstrument($flute);
$orchestra->printOut();

