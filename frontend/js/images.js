'use strict';

/*  
1. images model.
2. render images.
*/

var gNextId = 1;
var gImgs;

function init() {
    gImgs = createImgs();
    renderImgs(gImgs);
}

function createImgs() {
    var imgs = [];

   imgs.push(createImage('./img/gallery/Oprah-You-Get-A.jpg', ['happy']),
        createImage('./img/gallery/One-Does-Not-Simply.jpg', ['fun']),
        createImage('./img/gallery/Ancient-Aliens.jpg', ['happy']),
        createImage('./img/gallery/Batman-Slapping-Robin.jpg', ['happy']),
        createImage('./img/gallery/Mocking-Spongebob.jpg', ['happy']),
        createImage('./img/gallery/success.jpg', ['happy']),
        createImage('./img/gallery/X-Everywhere.jpg', ['sad']),
        createImage('./img/gallery/Drake-Hotline-Bling.jpg',['sad']),
        createImage('./img/gallery/1kwmfp.jpg', ['sad']),
        createImage('./img/gallery/3ks7.jpg', ['sad']),
        createImage('./img/gallery/10-Guy.jpg', ['sad']),
        createImage('./img/gallery/72745676.jpg', ['sad']),
        createImage('./img/gallery/Afraid-To-Ask-Andy.jpg', ['sad']),
        createImage('./img/gallery/Am-I-The-Only-One-Around-Here.jpg', ['sad']),
        createImage('./img/gallery/Bad-Luck-Brian.jpg', ['sad']),
        createImage('./img/gallery/Black-Girl-Wat.jpg', ['sad']),
        createImage('./img/gallery/Blank-Nut-Button.jpg', ['sad']),
        createImage('./img/gallery/Boardroom-Meeting-Suggestion.jpg', ['sad']),
        createImage('./img/gallery/Brace-Yourselves-X-is-Coming.jpg', ['sad']),
        createImage('./img/gallery/bpffa.jpg', ['sad']),
        createImage('./img/gallery/Captain-Picard-Facepalm.jpg', ['sad']),
        createImage('./img/gallery/Change-My-Mind.jpg', ['sad']),
        createImage('./img/gallery/Creepy-Condescending-Wonka.jpg', ['sad']),
        createImage('./img/gallery/Disaster-Girl.jpg', ['sad']),
        createImage('./img/gallery/Distracted-Boyfriend.jpg', ['sad']),
        createImage('./img/gallery/Expanding-Brain.jpg', ['sad']),
        createImage('./img/gallery/Face-You-Make-Robert-Downey-Jr.jpg', ['sad']),
        createImage('./img/gallery/Finding-Neverland.jpg', ['sad']),
        createImage('./img/gallery/Grumpy-Cat.jpg', ['sad']),
        createImage('./img/gallery/guywithcup.jpg', ['sad']),
        createImage('./img/gallery/Hard-To-Swallow-Pills.jpg', ['sad']),
        createImage('./img/gallery/If-You-Know-What-I-Mean-Bean.jpg', ['sad']),
        createImage('./img/gallery/I-Know-That-Feel-Bro.jpg', ['sad']),
        createImage('./img/gallery/Is-This-A-Pigeon.jpg', ['sad']),
        createImage('./img/gallery/Its-Finally-Over.jpg', ['sad']),
        createImage('./img/gallery/Laughing-Men-In-Suits.jpg', ['sad']),
        createImage('./img/gallery/Left-Exit-12-Off-Ramp.jpg', ['sad']),
        createImage('./img/gallery/Leonardo-Dicaprio-Cheers.jpg', ['sad']),
        createImage('./img/gallery/Liam-Neeson-Taken-2.jpg', ['sad']),
        createImage('./img/gallery/Marked-Safe-From.jpg', ['sad']),
        createImage('./img/gallery/Me-And-The-Boys.jpg', ['sad']),
        createImage('./img/gallery/Mocking-Spongebob.jpg', ['sad']),
        createImage('./img/gallery/nigga.jpg', ['sad']),
        createImage('./img/gallery/Philosoraptor.jpg', ['sad']),
        createImage('./img/gallery/qby413sh1v711.png', ['sad']),
        createImage('./img/gallery/Roll-Safe-Think-About-It.jpg', ['sad']),
        createImage('./img/gallery/Running-Away-Balloon.jpg', ['sad']),
        createImage('./img/gallery/shutupandtakemymoney.png', ['sad']),
        createImage('./img/gallery/Surprised-Pikachu.jpg', ['sad']),
        createImage('./img/gallery/The-Rock-Driving.jpg', ['sad']),
        createImage('./img/gallery/Trump-Bill-Signing.jpg', ['sad']),
        createImage('./img/gallery/Two-Buttons.jpg', ['sad']),
        createImage('./img/gallery/X-All-The-Y.jpg', ['sad']),
        createImage('./img/gallery/Yall-Got-Any-More-Of-That.jpg', ['sad']),
        createImage('./img/gallery/3a3.jpg', ['sad']),
        createImage('./img/gallery/waiting-skeleton.jpg', ['sad']),
        createImage('./img/gallery/18bzwy.jpg', ['sad']),
        createImage('./img/gallery/184vq8.jpg', ['sad']),
        createImage('./img/gallery/2g1j3o.jpg', ['sad']),
        createImage('./img/gallery/2l8ijj.jpg', ['sad']),
        createImage('./img/gallery/3snea.jpg', ['sad']),
        createImage('./img/gallery/Tuxedo-Winnie-The-Pooh.png', ['sad']),
        createImage('./img/gallery/2xexq8.png', ['sad']),
        createImage('./img/gallery/The-Scroll-Of-Truth.jpg', ['sad']),
        createImage('./img/gallery/The-Most-Interesting-Man-In-The-World.jpg', ['sad']),
        createImage('./img/gallery/1rzy4a.jpg', ['sad']),
        createImage('./img/gallery/That-Would-Be-Great.jpg', ['sad']),
        createImage('./img/gallery/1e9phd.jpg', ['sad']),
        createImage('./img/gallery/b13tc.jpg', ['sad']),
        createImage('./img/gallery/First-World-Problems.jpg', ['sad']),
        createImage('./img/gallery/Who-Would-Win.jpg', ['sad']),
        createImage('./img/gallery/Grandma-Finds-The-Internet.jpg', ['sad']),
        createImage('./img/gallery/But-Thats-None-Of-My-Business.jpg', ['sad']),
        createImage('./img/gallery/Y-U-No.jpg', ['sad']),
        createImage('./img/gallery/Star-Wars-Yoda.jpg', ['sad']),
        createImage('./img/gallery/Dr-Evil-Laser.jpg', ['sad']),
        createImage('./img/gallery/Evil-Toddler.jpg', ['sad']),
        createImage('./img/gallery/Sleeping-Shaq.jpg', ['sad']),
        createImage('./img/gallery/9n1nu.jpg', ['sad']),
        createImage('./img/gallery/jse4v.jpg', ['sad']),
        createImage('./img/gallery/Back-In-My-Day.jpg', ['sad']),
        createImage('./img/gallery/167ev8.jpg', ['sad']),
        createImage('./img/gallery/Consuela.jpg', ['sad']),
        createImage('./img/gallery/Sad-Keanu.jpg', ['sad']));




    return imgs;
}

function createImage(url, keywords) {
    return {
        id: gNextId++,
        url: url,
        keywords: keywords
    };
}

function renderImgs(imgs) {
    var strHtml = imgs.map(function (img, idx) {
        return `

        <img id='${img.id}' src='${img.url}' onclick="initMemeEditor(${img.id},this)" alt='meme picture'/>

        `
    })
        .join(' ')
        
    document.querySelector('.gallery').innerHTML = strHtml;
}

// <div id='${img.id}' class="photo" onclick="initMemeEditor(${img.id},this)" style="background-image: url('${img.url}')">