require('./bootstrap');

window.Vue = require('vue').default;



Vue.component('Netwrix', require('./components/netwrix/Netwrix.vue').default);

const app = new Vue({
    el: '#app',
    data: {
        partners: {},
        searchType: null,
        partnerName: 'Type',
        showFilter: false,
        showLoader: false,
    },
    methods: {
        showCurrent() {
            let valuePartner;
            let inputValue = this.searchType.toLowerCase();
            $('.selector-items .selector-item').each(function( index ){
                valuePartner = $(this).text().replace(/ +/g, ' ').trim().toLowerCase();
                if(valuePartner.includes(inputValue)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        },
        getPartners(type) {
            this.showFilter = false;
            this.partnerName = type;
            this.showLoader = true;
            if(type == 'all') {
                this.partnerName = 'Type';
                this.getPartnersAll();
            } else {
                axios.post('/api/getPartners/' + type).then((response) => {
                    this.partners = response.data;
                    this.showLoader = false;
                });
            }
        },
        getPartnersAll() {
            this.showLoader = true;
            this.showFilter = false;
            axios.post('/api/getAllPartners').then((response) => {
                this.partners = response.data;
                this.showLoader = false;
            });
        },
        getClassActive(dbValue, vueValue) {
            let partnerClass;
            if(dbValue == vueValue) {
                partnerClass = 'active';
            } else {
                partnerClass = '';
            }
            return partnerClass;
        }
    },
    mounted() {
        this.getPartnersAll();
    }
});
