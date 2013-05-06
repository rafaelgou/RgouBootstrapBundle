THEMES=
 
for theme in amelia cerulean cosmo cyborg journal readable simplex slate spacelab spruce superhero united
do
    mkdir ${theme}
    cd ${theme}
    wget http://netdna.bootstrapcdn.com/bootswatch/2.3.1/${theme}/bootstrap.min.css
    cd ../ 
done
