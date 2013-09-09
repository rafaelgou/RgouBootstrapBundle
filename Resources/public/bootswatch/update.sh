THEMES=
 
for theme in amelia cerulean cosmo cyborg flatly journal readable simplex slate spacelab united
do
    mkdir ${theme}
    cd ${theme}
    rm bootstrap.min.css bootstrap.min.css.1
    wget http://netdna.bootstrapcdn.com/bootswatch/3.0.0/${theme}/bootstrap.min.css
    cd ../ 
done
