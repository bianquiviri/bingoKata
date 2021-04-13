<?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Card;
    use App\Models\CardItems;
    use App\Models\Game;
    
    use function PHPUnit\Framework\isEmpty;
    
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    class GameController extends Controller
    {
        // to show a list of games created
        public function index()
        {
            try {
                $games = Game::get();
                return response()->json(['games' => $games], 200);
            } catch (\Exception $exception) {
                return response()->json(['error' => $exception->getMessage()], 500);
            }
        }
        
        public function cards($idgame)
        {
            try {
                $cards = Card::join('card_items', 'cards.id', '=',
                   'card_items.cards_id')
                   ->where('cards.game_id', $idgame)
                   ->select('cards.id',
                      'card_items.b', 'card_items.i', 'card_items.n', 'card_items.g',
                      'card_items.o', 'cards.game_id')
                   ->get();
               
                if (isEmpty($cards)) {
                    return response()->json(['cards' => $cards], 200);
                } else {
                    return response()->json(['idgame' => $idgame, 'messages' => 'No data found'],
                       200);
                }
            } catch (\Exception $exception) {
                return response()->json(['error' => $exception->getMessage()], 500);
            }
        }
       
        public function cardDetail($idCard){
            try {
                return Card::find($idCard)->items ;
            } catch (\Exception $exception) {
                return $exception->getMessage();
            }
        }
        
        
        public function create()
        {
            try {
                // make a new game and  5 cards
                $game = new Game();
                $game->save();
                $this->_cards($game->id, 5);
                // to set the a winner;
                
                return response()->json([
                   'GameId' => $game->id, 'name' => $game->name,
                ], 200);
            } catch (\Exception $exception) {
                return response()->json(['error' => $exception->getMessage()], 505);
            }
        }
        
        
        public function _cards($idgame, $nrcard)
        {
            // to create a new card
            // a card has  5 rows
            try {
                for ($i = 0; $i < $nrcard; $i++) {
                    $card = new Card();
                    $card->game_id = $idgame;
                    $card->save();
                    $this->_SetIemsCard($card->id);
                }
            } catch (\Exception $exception) {
                return $exception->getMessage();
            }
        }
        
        public function _SetIemsCard($idCard)
        {
            // to set items for one card
            try {
                for ($i = 0; $i < 5; $i++) {
                    $cardsItems = new CardItems();
                    $cardsItems->cards_id = $idCard;
                    $cardsItems->save();
                }
            } catch (\Exception $exception) {
                return $exception->getMessage();
            }
        }
    }
