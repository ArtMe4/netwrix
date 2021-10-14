<template>
    <div>
        <div class="partners-items__item" v-for="partner in partnersitems">
            <div class="item-logo">
                <img :src="partner.logo" alt="">
            </div>
            <div class="item-info">
                <div class="item-info__detail">
                    <div class="detail-name">
                        {{ partner.company }}
                    </div>
                    <div class="detail-address">
                        {{ partner.address }}
                    </div>
                </div>
                <div class="item-info__diff">
                    <div class="diff-contacts">
                        <div class="diff-contacts__link">
                            <a :href="partner.website">Website</a>
                        </div>
                        <div class="diff-contacts__phone">
                            <a :href="'tel:' + partner.phone">{{ partner.phone }}</a>
                        </div>
                    </div>
                    <div class="diff-type">
                        {{ partner.status }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Netwrix",
    props: [
        "partnersitems"
    ]
}
</script>

<style scoped>

</style>
