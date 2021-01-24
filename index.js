const hero = document.querySelector('.hero');
const slider = document.querySelector('.slider');
const logo = document.querySelector('#logo');
const headline = document.querySelector('.headline');
const bps = document.querySelector('#bps');
const back = document.querySelector('#back');
const btn = document.querySelector('#but');
const btn1 = document.querySelector('#but1');
const sec2 = document.getElementById('sec2');
const sec3 = document.getElementById('sec3');


const t1 = new TimelineMax();

t1.fromTo(hero,2,{height:'0%'},{height:'80%', ease : Power2.easeInOut})
.fromTo(hero,1.5,{width:'100%' } ,{width:'80%' ,ease : Power2.easeInOut})
.fromTo(slider,1.2,{x:'-100%'},{x:'0%',ease : Power2.easeInOut},'-=1.5')
.fromTo(bps,1,{opacity:0,x:'0%'},{opacity:1,x:'350%',ease : Power2.easeInOut},'-=1')
.fromTo(logo,1,{opacity:0,x:40},{opacity:1,x:0,ease : Power2.easeInOut},'-=1')
.fromTo(headline,1,{opacity:0},{opacity:1,ease : Power2.easeInOut},'-=1.5')
.fromTo(btn,1,{opacity:0},{opacity:1,ease : Power2.easeInOut})
.fromTo(btn1,1,{opacity:0},{opacity:1,ease : Power2.easeInOut},'-=1');

btn.addEventListener('click',(ev)=>{
    sec2.scrollIntoView(true);
});
btn1.addEventListener('click',(ev)=>{
    sec3.scrollIntoView(true);
});


const teachbtn = document.querySelector("#teacher-btn");
const adminbtn = document.querySelector("#admin-btn");
const container = document.querySelector(".container");

teachbtn.addEventListener("click",() =>{
    container.classList.add('teacher_mode');
});

adminbtn.addEventListener("click",() =>{
    container.classList.remove('teacher_mode');
});