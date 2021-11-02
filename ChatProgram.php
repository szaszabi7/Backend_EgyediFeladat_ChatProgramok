<?php 

    class ChatProgram {
        private $id;
        private $name;
        private $launchDate;
        private $numberOfUsers;
        private $availableForAndroid;
        private $ratingOnGooglePlay;
        private $availableForiOS;
        private $ratingOnAppStore;

        public function __construct(string $name, string $launchDate,
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

        public function getLaunchDate() : string {
            return $this -> launchDate;
        }

        public function getNumberOfUsers() : ?int {
            return $this -> numberOfUsers;
        }

        public function getAvailableForAndroid() : string {
            return $this -> availableForAndroid;
        }

        public function getRatingOnGooglePlay() : float{
            return $this -> ratingOnGooglePlay;
        }

        public function getAvailableForiOS() : string {
            return $this -> availableForiOS;
        }

        public function getRatingOnAppStore() : float{
            return $this -> ratingOnAppStore;
        }


        public static function osszes() : array {
            global $db;
            
            $t = $db -> query("SELECT * FROM adatok ORDER BY id ASC")
                -> fetchAll();
                $eredmeny = [];
                
                foreach ($t as $elem) {
                    $chatAdatok = new ChatProgram($elem['name'], $elem['launchDate'],
                                                    $elem['numberOfUsers'], $elem['availableForAndroid'], 
                                                    $elem['ratingOnGooglePlay'], $elem['availableForiOS'],
                                                    $elem['ratingOnAppStore']);
                    $chatAdatok -> id = $elem['id'];
                $eredmeny[] = $chatAdatok;
            }
            
            return $eredmeny;
        }

        public static function chatUpadte(string $chatName, string $chatLaunchDate,
                                            int $chatNumberOfUsers, string $chatAvailableForAndroid, float $chatRatingOnGooglePlay, 
                                            string $chatAvailableForiOS, float $chatRatingOnAppStore, int $chatId) {
            global $db;
 
            $db -> prepare('UPDATE adatok SET name = :name, launchDate = :launchDate,
                           numberOfUsers = :numberOfUsers, availableForAndroid = :availableForAndroid,
                           ratingOnGooglePlay = :ratingOnGooglePlay, availableForiOS = :availableForiOS,
                           ratingOnAppStore = :ratingOnAppStore WHERE id = :id')
                 -> execute([':name' => $chatName, ':launchDate' => $chatLaunchDate, ':numberOfUsers' => $chatNumberOfUsers,
                             ':availableForAndroid' => $chatAvailableForAndroid, ':ratingOnGooglePlay' => $chatRatingOnGooglePlay,
                             ':ratingOnGooglePlay' => $chatRatingOnGooglePlay, ':availableForiOS' => $chatAvailableForiOS,
                             ':ratingOnAppStore' => $chatRatingOnAppStore, ':id' => $chatId]);
         }
    }

?>