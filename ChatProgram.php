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
                    $chatAdatok = new ChatProgram($elem['name'], new DateTime($elem['launchDate']),
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
        
        public static function chatDelete(int $id) {
            global $db;

                $db->prepare('DELETE FROM adatok WHERE id = :id')
                ->execute([':id' => $id]);
        }

        public function chatAdd() {
            global $db;

            $db->prepare('INSERT INTO adatok (name, launchDate, numberOfUsers, availableForAndroid, ratingOnGooglePlay, availableForiOS, ratingOnAppStore) 
                                    VALUES (:name, :launchDate, :numberOfUsers, :availableForAndroid, :ratingOnGooglePlay, :availableForiOS, :ratingOnAppStore)')
                ->execute([':name' => $this -> name, 
                            ':launchDate' => $this -> launchDate, 
                            ':numberOfUsers' => $this -> numberOfUsers,
                            ':availableForAndroid' => $this -> availableForAndroid, 
                            ':ratingOnGooglePlay' => $this -> ratingOnGooglePlay,
                            ':availableForiOS' => $this -> availableForiOS,
                            ':ratingOnAppStore' => $this -> ratingOnAppStore]);
        }
    }

?>