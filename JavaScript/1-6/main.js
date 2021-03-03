//question1
let array = [10,15,20,25];
console.log(array);

for (let i = 0; i < array.length; i++){
    if (array[i]%2 === 0){
        console.log(array[i] + "は偶数です");
    }
}


//question2
let car = {
    gas: 20.5,
    num: 1234,
}
console.log(car);

console.log("ガソリンは" + car.gas + "です");
console.log("ナンバーは" + car.num + "です");