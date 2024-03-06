document.addEventListener('DOMContentLoaded', function() {
    const btnLove = document.querySelector('.btn-love');
    btnLove.addEventListener('click',function(e){
        if(!this.classList.contains('act')){
            this.className += " act";
            let Tl = new TimelineMax({});
            Tl.to('.fa',0.1,{
                scale:0,
                ease:Back.easeNone,
            })
            Tl.to('.fa',0.2,{
                delay:0.1,
                scale:1.3,
                color:'#e3274d',
                ease:Ease.easeOut
            })
            Tl.to('.fa',0.2,{
                scale:1,
                ease:Ease.easeOut
            })
        }else{
            this.classList.remove('act');
            TweenMax.set('.fa',{
                color:'#c0c1c3',
            })
        }
    })
});