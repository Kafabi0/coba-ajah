document.addEventListener('alpine:init', ( ) => {
    Alpine.data('products', ( ) => ({
        items: [
            {id: 1 , name: 'Arwana silver', img: 'arwanaa.jpg',price: 300000},
            {id: 2 , name: 'Manfish', img: 'manfish.jpg',price: 5000},
            {id: 3 , name: 'Cupang', img: 'cupang.jpg',price: 15000},
            {id: 4 , name: 'Aligator', img: 'aligator.jpg',price: 15000},
            {id: 5 , name: 'Koi', img: 'loi.jpg',price: 25000},
            {id: 6 , name: 'Glowfish', img: 'glofid.jpg',price: 10000},
            {id: 7 , name: 'Louhan', img: 'louhan.jpg',price: 50000},
            {id: 8 , name: 'Black Ghost', img: 'black gost.jpg',price: 15000},
            {id: 9 , name: 'Oscar', img: 'oscar.jpg',price: 85000},
            {id: 10 , name: 'Takari', img: 'takari.png',price: 10000},
        ],
    }));
} );