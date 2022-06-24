<?php
    class NeuralNetwork
    {
        public $InputSize = 0;
        public $CountHiddenLayers = 0;
        public $OutputSize = 0;
        public $learningCoef = 0.1;
        private $Weight=[];
        private $InputNeurons=[];

        public function __construct($InputSize, $CountHiddenLayers, $OutputSize ,$learningCoef)
        {
            $this->InputSize = $InputSize;
            $this->CountHiddenLayers = $CountHiddenLayers;
            $this->OutputSize = $OutputSize;
            $learningCoef= $learningCoef < 0.1 ? 0.1 : $learningCoef;
            $learningCoef= $learningCoef > 0.9 ? 0.9 : $learningCoef;
            $this->learningCoef = $learningCoef;


            for ($i = 0; $i < $OutputSize; $i++)
            {
                $line = [];
                for ($j=0; $j < $InputSize + $CountHiddenLayers*$OutputSize; $j++) { 
                    array_push($line,rand(0,100)/100);
                }
                array_push($this->Weight,$line);
            }

            $im = imagecreatefrompng("1.png");
            $rgb = imagecolorat($im, 260, 180);

            $colors = imagecolorsforindex($im, $rgb);
            var_dump($colors);

        }

        public function sigmoid($x) {
            return 1 / (1 + exp(-$x));
        }
        public function sigmoidDerivative($x) {
            return $this->sigmoid($x) * (1 - $this->sigmoid($x));
        }
        public function trainDataSet($InputDataSet, $ExpectingDataSet)
        {       
            if(!is_array($InputDataSet) || !is_array($ExpectingDataSet))
            { 
                print("ОШИБКА 1");   
                return;  
            }

            if (count($InputDataSet)!=count($ExpectingDataSet))
            {
                print("Ошибка 2");
                return;
            }

            foreach ($InputDataSet as $key => $value) {
                var_dump($value);
            }

            for ($i=0; $i < $this->InputSize; $i++) { 
                
            }        
            return 0;
        }
    }
