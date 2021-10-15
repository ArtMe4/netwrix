@extends('layouts/header')

@section('content')
    <div class="content-filter">
        <div class="content-filter__body">
            <div class="content-filter__title">
                Netwrix Partner Locator
            </div>
            <div class="content-filter__description">
                <div class="description-help">
                    Hundreds of Netwrix partners around the world are standing by to help you.
                </div>
                <div class="description-locator">
                    With our Partner Locator you can easily find the list of authorized partners in your area.
                </div>
            </div>
            <div class="content-filter__filters">
                <div class="filters-find">
                    <form action="">
                        <div class="filters-find__form">
                            <input type="text" placeholder="Search by company name or adress..">
                            <button type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="23" viewBox="0 0 22 23" fill="none">
                                    <rect y="0.864929" width="22" height="22" fill="black" fill-opacity="0.01"/>
                                    <path d="M14.2857 11.7143C14.2857 13.9196 12.4911 15.7143 10.2857 15.7143C8.08036 15.7143 6.28571 13.9196 6.28571 11.7143C6.28571 9.50893 8.08036 7.71428 10.2857 7.71428C12.4911 7.71428 14.2857 9.50893 14.2857 11.7143ZM18.8571 19.1429C18.8571 18.8393 18.7321 18.5446 18.5268 18.3393L15.4643 15.2768C16.1875 14.2321 16.5714 12.9821 16.5714 11.7143C16.5714 8.24107 13.7589 5.42857 10.2857 5.42857C6.8125 5.42857 4 8.24107 4 11.7143C4 15.1875 6.8125 18 10.2857 18C11.5536 18 12.8036 17.6161 13.8482 16.8929L16.9107 19.9464C17.1161 20.1607 17.4107 20.2857 17.7143 20.2857C18.3393 20.2857 18.8571 19.7679 18.8571 19.1429Z" fill="#0068DA"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="filters-selectors">
                    <div class="filters-selectors__group">
                        <div class="group-item">
                            <div class="group-item__body" @click="showFilter = !showFilter">
                                <div class="group-item__text">
                                    @{{ partnerName }}
                                </div>
                                <div class="group-item__arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="7" viewBox="0 0 8 7" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.864929H8L4 6.86493L0 0.864929Z" fill="white"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="group-item__selector" :class="{active: showFilter}">
                                <div class="selector-search">
                                    <input type="text" v-model='searchType' @input="showCurrent()">
                                </div>
                                <div class="selector-items">
                                    <div class="selector-item" :class='getClassActive("Type", partnerName)' @click='getPartners("all")'>
                                        Type
                                    </div>
                                    @foreach($partnersType as $partner)
                                        <div class="selector-item" :class='getClassActive("{{$partner}}", partnerName)'  @click='getPartners("{{$partner}}")'>
                                            {{$partner}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filters-selectors__group">
                        <div class="group-item">
                            <div class="group-item__body">
                                <div class="group-item__text">
                                    Country
                                </div>
                                <div class="group-item__arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="7" viewBox="0 0 8 7" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.864929H8L4 6.86493L0 0.864929Z" fill="white"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="group-item">
                            <div class="group-item__body">
                                <div class="group-item__text">
                                    State
                                </div>
                                <div class="group-item__arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="7" viewBox="0 0 8 7" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.864929H8L4 6.86493L0 0.864929Z" fill="white"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body">
        <div class="preloader" :class="{loaded: !showLoader, loaded__hide: showLoader}">
            <svg class="preloader__image" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor"
                      d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z">
                </path>
            </svg>
        </div>
        <section class="partners">
            <div class="partners-items">
                <div v-if="dataEmpty">
                    Your search parameters did not match any partners. Please try different search.
                </div>
                <netwrix
                    :partnersitems="this.partners"
                >
                </netwrix>
            </div>
        </section>
    </div>
@endsection

@extends('layouts/footer')
