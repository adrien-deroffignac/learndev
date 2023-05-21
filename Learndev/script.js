const menuDepliant = document.querySelector(".nav-toggler")

const navigation = document.querySelector("div .nav")

menuDepliant.addEventListener("click",toggleNav)

function toggleNav(){
    menuDepliant.classList.toggle("active")
    navigation.classList.toggle("active")
}



const tweetBoite = document.getElementById('boite-tweet-rapide');

        function tweetRapide() {
            if (tweetBoite.style.display == 'block') {
                tweetBoite.style.display = 'none';
            } else {
                tweetBoite.style.display = 'block';
            }
        }