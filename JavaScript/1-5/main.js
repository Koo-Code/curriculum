function createJuice(fruits){
    console.log(fruits + "を受け取りました。ジュースにして返します");
    return fruits +"ジュース";
}

let hogeJuice = createJuice("みかん");
console.log(hogeJuice + "が届きました");