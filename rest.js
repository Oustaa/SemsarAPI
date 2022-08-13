filtedBy = [
    { name: "minPrice", value: 522 },
    { name: "maxPrice", value: 788 },
];
baseUrl = "http://localhost/restapi/api/Items/read?";

url =
    baseUrl +
    filtedBy.reduce(
        (current, added) =>
        current.name + "=" + current.value + "&" + added.name + "=" + added.value
    );

console.log(url);

filtedBy = { minPrice: 522, maxPrice: 788 };
console.log(Object.keys(filtedBy).indexOf("maxPrice"));