<?php
    class Component {
        public $id;
        public $model;
        public $price;
        public $quantity;
    }

    class CPU extends Component {
        public $socket;
        public $cores;
        public $clock_speed;
        public $boost_clock_speed;
        public $TDP;
    }

    class CPU_fan extends Component {
        public $height;
    }

    class RAM extends Component {
        public $ddr;
        public $memory_size;
        public $frequency;
    }

    class Motherboard extends Component {
        public $socket;
        public $forma;
        public $chipset;
        public $ram_slots;
        public $safe_CPU_TDP;
    }

    class PSU extends Component {
        public $power;
        public $isModular;
        public $fan;
        public $certificate;
    }

    class SSD extends Component {
        public $manufacturer;
        public $write_speed;
        public $read_speed;
        public $capacity;
    }

    class HDD extends Component {
        public $manufacturer;
        public $rotation_speed;
        public $capacity;
        public $size;
    }

    class GPU extends Component {
        public $gpu_clock;
        public $memory;
        public $memory_clock;
        public $length;
    }

    class PC_case extends Component {
        public $format;
        public $height;
        public $width;
        public $depth;
        public $weight;
        public $gpu_length;
        public $cooler_height;
    }
?>