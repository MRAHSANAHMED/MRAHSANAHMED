let ms = 0, s=0, m=0;
let counter;
const start = document.querySelector('.start');
const stopTimer = document.querySelector('.stop');
const resetTimer = document.querySelector('.reset');
const time = document.querySelector('.time');


start.addEventListener('click',function(){
    if(!counter){
    counter = setInterval(run,10)
    }
    function run() {
        time.textContent = currentTime()
        ms++
        if (ms==100) {
            ms=00;
            s++;
        }
        if (s==60){
            s=00;
            m++
        }
    }
})
stopTimer.addEventListener('click',function(){
    clearInterval(counter);
    counter = false;
})
resetTimer.addEventListener('click',function(){
    clearInterval(counter);
    counter = false;
    ms=0 + "0",s=0+ "0",m=0 + "0";
    time.textContent = currentTime()

})
function currentTime() {
    return m + ":" + s + ":" + ms
}