//question1
console.log("問1");

let numbers = [2,5,12,13,15,18,22];
console.log(numbers);

function isEven(num) {
    for (let i = 0; i < num.length; i++){
        if(num[i]%2 === 0){
            console.log(num[i] + 'は偶数です');
        }
    }
}

isEven(numbers);



//question2
console.log("問２");

class Car{
    constructor(gas,number){
        this.gas = gas;
        this.number = number;
    }

    getNumGas(){
        console.log(`ガソリンは${this.gas}です。ナンバーは${this.number}です。`);
    }
}

let car = new Car(50,1234);
car.getNumGas();