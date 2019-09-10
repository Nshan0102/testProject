<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["legendize","legendized","legendizes","legendizing","legendries","legendry","legends","leger","legerdemain","legerdemainist","legerdemainists","legerdemains","legering","legerings","legerities","legerity","legers","leges","legge","legged","legger","leggers","legges","leggie","leggier","leggiero","leggies","leggiest","leggin","legginess","legginesses","legging","legginged","leggings","leggins","leggism","leggisms","leggy","leghorn","leghorns","legibilities","legibility","legible","legibleness","legiblenesses","legibly","legion","legionaries","legionary","legioned","legionella","legionellae","legionellas","legionnaire","legionnaires","legions","legislate","legislated","legislates","legislating","legislation","legislations","legislative","legislatively","legislatives","legislator","legislatorial","legislators","legislatorship","legislatorships","legislatress","legislatresses","legislature","legislatures","legist","legists","legit","legitim","legitimacies","legitimacy","legitimate","legitimated","legitimately","legitimateness","legitimates","legitimating","legitimation","legitimations","legitimatise","legitimatised","legitimatises","legitimatising","legitimatize","legitimatized","legitimatizes","legitimatizing","legitimator","legitimators","legitimisation","legitimisations","legitimise","legitimised","legitimiser","legitimisers","legitimises","legitimising","legitimism","legitimisms","legitimist","legitimistic","legitimists","legitimization","legitimizations","legitimize","legitimized","legitimizer","legitimizers","legitimizes","legitimizing","legitims","legits","leglan","leglans","leglen","leglens","legless","leglessness","leglessnesses","leglet","leglets","leglike","leglin","leglins","legman","legmen","legong","legongs","legroom","legrooms","legs","legside","legsides","leguaan","leguaans","leguan","leguans","legume","legumes","legumin","leguminous","legumins","legwarmer","legwarmers","legwear","legwears","legwork","legworks","lehaim","lehaims","lehayim","lehayims","lehr","lehrjahre","lehrs","lehua","lehuas","lei","leidger","leidgers","leiger","leigers","leiomyoma","leiomyomas","leiomyomata","leiotrichies","leiotrichous","leiotrichy","leipoa","leipoas","leir","leired","leiring","leirs","leis","leish","leisher","leishest","leishmania","leishmaniae","leishmanial","leishmanias","leishmaniases","leishmaniasis","leishmanioses","leishmaniosis","leisler","leislers","leister","leistered","leistering","leisters","leisurable","leisurably","leisure","leisured","leisureliness","leisurelinesses","leisurely","leisures","leisuring","leitmotif","leitmotifs","leitmotiv","leitmotivs","lek","leke","lekgotla","lekgotlas","lekked","lekker","lekking","lekkings","leks","leku","lekvar","lekvars","lekythi","lekythoi","lekythos","lekythus","leman","lemans","leme","lemed"];
        for ($i=0; $i < count($categories); $i++) {
            Category::create([
                'name' => $categories[$i],
            ]);
        }
    }
}
