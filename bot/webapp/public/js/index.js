var app = new Vue({
    el: '#app',
    data: {
        stuffs: {
            smallStuff: {
                name: 'Небольшие вещи',
                hint: '',
                subtotal: 0,
                isCategory: true,
                items: {
                    standartBox: {
                        name: 'Стандартная коробка',
                        hint: 'Обычная картонная коробка 60х40х40 см (сами привезём коробки и соберём вещи)',
                        price: 140,
                        isChecked: false,
                        isMultiple: true,
                        count: 1
                    },
                    qbBox: {
                        name: 'Бокс Кьюби',
                        hint: 'Специальный пластиковый ящик 60х40х37 см, прочнее и удобнее коробки',
                        price: 240,
                        isChecked: false,
                        isMultiple: true,
                        count: 1
                    },
                    books: {
                        name: 'Книги',
                        hint: 'Коробки для книг меньше, но прочнее (40х40х25 см)',
                        price: 70,
                        isChecked: false,
                        isMultiple: true,
                        count: 1
                    },
                    dishes: {
                        name: 'Посуда',
                        hint: 'Коробки для посуды стандартные, но в их стоимость входит дополнительная упаковка для посуды',
                        price: 140,
                        isChecked: false,
                        isMultiple: true,
                        count: 1
                    },
                    bag: {
                        name: 'Чемодан или сумка',
                        hint: 'То, что не влезает в коробку',
                        price: 280,
                        isChecked: false,
                        isMultiple: true,
                        count: 1
                    },
                    tyres: {
                        name: 'Шины или колеса',
                        hint: '',
                        price: 590,
                        isChecked: false,
                        isMultiple: true,
                        count: 1
                    },
                },
            },
            furniture: {
                name: 'Мебель',
                isCategory: true,
                subtotal: 0,
                items: {
                    tables: {
                        name: 'Столы',
                        hint: 'Длина:',
                        isCategory: true,
                        items: {
                            table1: {
                                name: 'До 1 метра',
                                price: 490,
                                isChecked: false,
                                isMultiple: true,
                                count: 1
                            },
                            table2: {
                                name: '1–2 метра',
                                price: 640,
                                isChecked: false,
                                isMultiple: true,
                                count: 1
                            },
                            table3: {
                                name: 'Больше 2 метров',
                                price: 790,
                                isChecked: false,
                                isMultiple: true,
                                count: 1
                            },
                        },
                    },
                    closets: {
                        name: 'Столы',
                        hint: 'Длина:',
                        isCategory: true,
                        items: {
                            closet40: {
                                name: 'До 1 метра',
                                price: 490,
                                isChecked: false,
                                isMultiple: true,
                                count: 1
                            },
                            closet60: {
                                name: '1–2 метра',
                                price: 640,
                                isChecked: false,
                                isMultiple: true,
                                count: 1
                            },
                            closet80: {
                                name: 'Больше 2 метров',
                                price: 790,
                                isChecked: false,
                                isMultiple: true,
                                count: 1
                            },
                        },
                    },
                    nightstands: {
                        name: 'Тумбы',
                        isCategory: true,
                        items: {
                            1: {
                                name: 'Прикроватные',
                                price: 340,
                                isChecked: false,
                                isMultiple: true,
                                count: 1
                            },
                            2: {
                                name: 'Канцелярская',
                                price: 490,
                                isChecked: false,
                                isMultiple: false,
                                count: 1
                            },
                            3: {
                                name: 'Под ТВ',
                                price: 740,
                                isChecked: false,
                                isMultiple: false,
                                count: 1
                            },
                        },
                    },
                }
            },
            sport: {
                name: 'Спорт',
                hint: '',
                subtotal: 0,
                isCategory: true,
                items: {
                    bicycle: {
                        name: 'Велосипеды',
                        price: 590,
                        isChecked: false,
                        isMultiple: true,
                        count: 1
                    },
                    scooters: {
                        name: 'Электро-самокаты',
                        price: 490,
                        isChecked: false,
                        isMultiple: true,
                        count: 1
                    },
                    snow: {
                        name: 'Сноуборды или лыжи: 490',
                        price: 490,
                        isChecked: false,
                        isMultiple: true,
                        count: 1
                    },
                },
            },
            kids: {
                name: 'Детское',
                hint: '',
                subtotal: 0,
                isCategory: true,
                items: {
                    seat: {
                        name: 'Автомобильное кресло',
                        price: 590,
                        isChecked: false,
                        isMultiple: false,
                        count: 1
                    },
                    stroller: {
                        name: 'Коляска-люлька',
                        price: 490,
                        isChecked: false,
                        isMultiple: false,
                        count: 1
                    },
                    caneStroller: {
                        name: 'Коляска-трость',
                        price: 490,
                        isChecked: false,
                        isMultiple: false,
                        count: 1
                    },
                },
            },
        },
        periods: {
            month1:{
                name: "1 месяц",
                monthsCount: 1,
                discount: 0,
                isChecked: true
            },
            month6:{
                name: "6 месяцев",
                monthsCount: 6,
                discount: 20,
                isChecked: false
            },
            month12:{
                name: "12 месяцев",
                monthsCount: 12,
                discount: 30,
                isChecked: false
            },
        },
        period: 'month1',
        theme: {
            text_color: '#000000',
        },
        log: '',
        step: 1,
    },

    computed: {
          isMobile: function (){
              return (/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)); 
            },

          totalMonthPrice: function(){
           
            let total = 0;
            for (let stuff in this.stuffs){
                // debugger;
                let subtotal = 0;
                for (let item in this.stuffs[stuff].items){
                    if (!this.stuffs[stuff].items[item].isCategory){
                        if (this.stuffs[stuff].items[item].isChecked){
                            total += this.stuffs[stuff].items[item].price * this.stuffs[stuff].items[item].count;
                            subtotal += this.stuffs[stuff].items[item].price * this.stuffs[stuff].items[item].count;
                        }
                    } else {
                        for (let subitem in this.stuffs[stuff].items[item].items){
                            // debugger;
                            if (this.stuffs[stuff].items[item].items[subitem].isChecked){
                                total += this.stuffs[stuff].items[item].items[subitem].price * this.stuffs[stuff].items[item].items[subitem].count;
                                subtotal += this.stuffs[stuff].items[item].items[subitem].price * this.stuffs[stuff].items[item].items[subitem].count;
                            }
                        }
                    }
                }
                this.stuffs[stuff].subtotal = subtotal;
            }
            return total;
          },
          
          totalPeriodPrice: function(){
            const totalPeriodPrice = this.totalMonthPrice * this.periods[ this.period ].monthsCount  * (100 - this.periods[ this.period ].discount) / 100;
            return totalPeriodPrice;
          },
    },

    watch: {
        totalPeriodPrice: function ( value, oldvalue ) {
            if (window.Telegram.WebApp){
                if (value > 0){
                    window.Telegram.WebApp.MainButton.enable();
                    window.Telegram.WebApp.MainButton.text = "Оформить хранение → " + value + "₽";
                } else {
                    window.Telegram.WebApp.MainButton.disable();
                    window.Telegram.WebApp.MainButton.text = 'Выберете что-нибуть'; 
                }
            }
        },
    },

    methods: {
        initTelegramWebApp: function(){
            if (window.Telegram.WebApp) {
                window.Telegram.WebApp.MainButton.text = 'Выберете что-нибуть'; 
                window.Telegram.WebApp.MainButton.disable();
                
                  window.Telegram.WebApp.MainButton.onClick(() => {
                    this.step=2;
                    window.Telegram.WebApp.MainButton.disable();
                  });

                setTimeout(() => {
                    window.Telegram.WebApp.MainButton.isVisible = true;
                }, 2000);
            }
        },
    },
    mounted() {
        this.initTelegramWebApp();
    }
});