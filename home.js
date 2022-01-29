// document.getElementById("name").addEventListener("mouseleave",()=>{
//     document.getElementById("name").classList.add("hello")
// })
var car=document.querySelectorAll(".typename")
car.forEach(ele=> {
    ele.addEventListener("click",()=>{
        if(ele.innerHTML=="Vitrified"){
            document.getElementById("vitri").classList.toggle("block");
        }
        else if(ele.innerHTML=="Sanitary"){
            document.getElementById("sani").classList.toggle("block");
        }
        else if(ele.innerHTML=="Adhesive"){
            document.getElementById("adhe").classList.toggle("block");
        }
        else if(ele.innerHTML=="Border"){
            document.getElementById("bor").classList.toggle("block");
        }
        else if(ele.innerHTML=="Tap"){
            document.getElementById("tap").classList.toggle("block");
        }
        console.log(ele.innerHTML);
    })
})
document.querySelector(".up").addEventListener("click",()=>{
    window.scrollBy(0,-500)
})
// document.querySelector(".today").addEventListener("click",()=>{
//     window.scrollBy(0,500)
// })
// document.querySelector(".tot").addEventListener("click",()=>{
//     window.scrollBy(0,3000)
// })
// document.querySelector(".todap").addEventListener("click",()=>{
//     window.scrollBy(0,2300)
// })
// document.querySelector(".out").addEventListener("click",()=>{
//     window.scrollBy(0,2000)
// })
document.querySelector(".addsize").addEventListener("click",()=>{
    document.querySelector(".addsiz").classList.toggle("block");
    document.querySelector(".main").classList.toggle("blur");
    document.querySelector(".allbutton").classList.toggle("blur");
    document.querySelector(".toda").classList.toggle("blur");
    document.querySelector(".outt").classList.toggle("blur");
    document.querySelector(".total").classList.toggle("blur");
    document.querySelector(".main>form").classList.toggle("blur");
})
document.querySelector(".addname").addEventListener("click",()=>{
    document.querySelector(".addnam").classList.toggle("block");
    document.querySelector(".main").classList.toggle("blur");
    document.querySelector(".allbutton").classList.toggle("blur");
    document.querySelector(".toda").classList.toggle("blur");
    document.querySelector(".outt").classList.toggle("blur");
    document.querySelector(".total").classList.toggle("blur");
    document.querySelector(".main>form").classList.toggle("blur");
})
var alltype=document.querySelectorAll(".material")
alltype.forEach(ele => {
    ele.addEventListener("click",(e)=>{
        let box = e.target.nextElementSibling;
        var all=document.querySelectorAll(".box");
        all.forEach(element=>{
            if(element.textContent!=box.textContent)
                 element.classList.add("block");
                console.log(box.textContent)
            console.log(element.textContent)
        })
        box.classList.toggle("block");
    })    
});
