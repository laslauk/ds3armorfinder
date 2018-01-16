

//Typehead from https://twitter.github.io/typeahead.js/examples/
var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};

var armors = ['antiquated plain','antiquated','archdeacon','assassin','black hand',
'black leather','black witch','brigand','cleric','conjurator',"cornyx's",'court sorcerer',"dancer's",'deacon',
'desert pyromancer','deserter','drang','fire keeper','follower','grave warden','jailer',"karla's",'leather',"leonhard's",
'maiden',"master's",'mirrah','old sorcerer','ordained','painting guardian','pale shade','pontiff knight','prayer',
'pyromancer','shadow',"shira's",'sorcerer','worker','xanthous','alva','black','brass',
'chain','dark','dragonscale','eastern','elite knight','evangelist','fallen knight','fire witch','firelink',
'hard leather','herald','iron,knight','mirrah chain','nameless knight','northern','outrider knight','ringed knight','sellsword',
'armor of thorns','slave knight','sunless','undead legion',"vilhelm's",'wolf knight','black iron','black knight','catarina',
'cathedral knight','dragonslayer','drakeblood','executioner','exile','faraam',"gundyr's",'harald legion',"havel's",
'iron dragonslayer',"lapp's","lorian's",'lothric knight','millwood knight',"morne's",'ruin','armor of favor','silver knight',
"smough's",'winged knight'
];

$(".typeahead").typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'armors',
  source: substringMatcher(armors)
});