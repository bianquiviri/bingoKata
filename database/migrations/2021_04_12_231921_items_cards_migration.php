<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    class ItemsCardsMigration extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
        \Illuminate\Support\Facades\DB::statement("
             create sequence  b  start with  1 increment   1  minvalue  1 maxvalue 15;
        ");
            \Illuminate\Support\Facades\DB::statement("
             create sequence  i  start with  16 increment  1  minvalue  16 maxvalue 30;
        ");
            \Illuminate\Support\Facades\DB::statement("
             create sequence  n start with  31 increment   1  minvalue  31 maxvalue 45
        ");
    
            \Illuminate\Support\Facades\DB::statement("
              create sequence  g  start with  46 increment  1  minvalue  46 maxvalue 60
           ");
    
            \Illuminate\Support\Facades\DB::statement("
                create sequence  o  start with  61 increment  1  minvalue  61 maxvalue 75
           ");
    
    
            \Illuminate\Support\Facades\DB::statement("
       create table card_items
          (
             id  bigserial  not null  constraint card_items_pkey  primary key,
              b          integer default nextval('b'::regclass),
              i           integer default nextval('i'::regclass) not null,
              n          integer default nextval('n'::regclass) not null,
              g          integer default nextval('g'::regclass) not null,
              o          integer default nextval('o'::regclass) not null,
              cards_id   integer not null
               constraint card_items_cards_id_foreign
            references cards,
           created_at timestamp(0),
            updated_at timestamp(0)
        );
          ");


        }
        
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            // to drop table and the sequens
            \Illuminate\Support\Facades\DB::statement("drop table card_items");
            \Illuminate\Support\Facades\DB::statement("drop sequence b");
            \Illuminate\Support\Facades\DB::statement("drop sequence i");
            \Illuminate\Support\Facades\DB::statement("drop sequence n");
            \Illuminate\Support\Facades\DB::statement("drop sequence g");
            \Illuminate\Support\Facades\DB::statement("drop sequence o");
        }
    }
