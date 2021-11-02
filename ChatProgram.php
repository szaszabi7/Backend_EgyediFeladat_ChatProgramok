<?php 

    class chatProgramok {
        private $id;
        private $name;
        private $launchDate;
        private $numberOfUsers;
        private $availableForAndroid;
        private $ratingOnGooglePlay;
        private $availableForiOS;
        private $ratingOnAppStore;

        public function __construct(string $name, DateTime $launchDate,
         int $numberOfUsers, string $availableForAndroid, float $ratingOnGooglePlay, 
         string $availableForiOS, float $ratingOnAppStore)
        {
            $this -> name = $name;
            $this -> launchDate = $launchDate;
            $this -> numberOfUsers = $numberOfUsers;
            $this -> availableForAndroid = $availableForAndroid;
            $this -> ratingOnGooglePlay = $ratingOnGooglePlay;
            $this -> availableForiOS = $availableForiOS;
            $this -> ratingOnAppStore = $ratingOnAppStore;
        }

        public function getId() : ?int {
            return $this -> id;
        }

        public function getName() : string {
            return $this -> name;
        }

        public function getLaunchDate() : DateTime {
            return $this -> launchDate;
        }

        public function getNumberOfUsers() : ?int {
            return $this -> numberOfUsers;
        }

        public function getAvailableForAndroid() : string {
            return $this -> availableForAndroid;
        }

        public function getRatingOnGooglePlay() {
            return $this -> ratingOnGooglePlay;
        }

        public function getAvailableForiOS() : string {
            return $this -> availableForiOS;
        }

        public function getRatingOnAppStore() {
            return $this -> ratingOnAppStore;
        }
    }

?>