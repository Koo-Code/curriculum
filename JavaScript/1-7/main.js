class Taiyaki {
    constructor(hoge){
        this.hoge = hoge;
    }
    
    nakami(){
        console.log(`中身は${this.hoge}です`);
    }
}

let taiyaki = new Taiyaki('あんこ');
taiyaki.nakami();