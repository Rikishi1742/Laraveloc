const outputSpan = document.querySelector('.success-bids-amount');
let amount = 0;

function getSuccessfulBidsAmount(){
console.log('check');
fetch('http://127.0.0.1:8000/bids/successful')
.then(response =>response.json())
.then(json => {
if(amount !== json.amount){
animate();
amount = json.amount;
}
setContent(json.amount);
});
}

function setContent(text){
outputSpan.textContent = `${text}`;
}

function animate(){
outputSpan.classList.add('amount-update');
setTimeout( () => {
outputSpan.classList.remove('amount-update');
}, 1000);
}

getSuccessfulBidsAmount();
setInterval( ()=>{
getSuccessfulBidsAmount();
}, 5000);