<?php

use Illuminate\Database\Seeder;
use Spatie\Tags\Tag;

class CandidateTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Storing possible tags in a Google docs
        // Use formula: =ArrayFormula(""""&Sheet1!A:D&"""") for adding quotes
        // https://delim.co/ can add commas

        $allTags = ["Javascript","PHP","Ruby","Ruby On Rails","AWS","Node.js","MongoDB","Laravel","Python","Django","React.js","Vue.js","jQuery","Marketing","Content Marketing","Product Marketing","Product Management","Project Management","Customer Success","Sales","Recruiting","Human Resources","UX Design","UI Design","Design","Software Engineering","Java","MySQL","Customer Support","SQL","Google Cloud","DevOps","Chef","Puppet","Leadership","New Grad","MBA Grad","ES6","Director Level","C level","Bootcamp grad","PostgreSQL","Marketo","Salesforce","Hungry to learn","Willing to travel","Wordpress","HTML","CSS","Photoshop","Go lang","Elixir","Angular","ElasticSearch","Angular.js","Entry level","Security","Penetration testing","Non-profit experience","Supply chain","Logistics","US Military Veteran","Executive Assistant","Graphic Design","C#","Gaming",".NET","Mobile","Android","iOS","Swift","Kotlin","Git","Hadoop","Machine Learning","Data Science","Artificial Intelligence","SQL Server"];

        foreach($allTags as $tagName) {
            Tag::findOrCreate($tagName, 'candidate');
        }
    }
}
