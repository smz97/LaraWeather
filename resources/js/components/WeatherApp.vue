<template>
    <div class="text-white mb-10">
        <div class="places-input text-gray-800">
            <input type="text" class="w-full">
        </div>
        <!-- weather-container -->
        <div class="weather-container font-sans w-128 rounded-lg max-w-lg overflow-hidden bg-gray-900 shadow-lg mt-4">

            <!-- current-weather -->
            <div class="current-weather flex items-center justify-between px-6 py-8">
                <div class="flex items-center">
                    <div>
                        <div class="text-6xl font-semibold"> {{ current_weather.now_temprature }} </div>
                        <div> Feels like {{ current_weather.feelslike }} </div>
                    </div>

                    <div class="mx-5">
                        <div class="font-semibold"> {{ current_weather.description }} </div>
                        <div> {{ current_weather.location }} </div>
                    </div>
                </div>
                <div>
                    <img :src="current_weather.icon" alt="icon">
                </div>
            </div>
            <!-- current-weather -->
            
            <!-- forecast-weather -->
            <div class="forecast-weather text-sm bg-gray-800 px-6 py-8 overflow-hidden">

                <div v-for="(forecast,index) in daily_forecast_data" :key="index" class="forecast-item flex items-center">
                    <div class="w-1/6 text-gray-200"> {{ forecast.day }} </div>
                    <div class="w-4/6 px-4 flex items-center"> 
                        <div>  <img :src=" forecast.icon " alt=""> </div>
                        <div class="ml-3"> {{ forecast.description }} </div>
                    </div>
                    <div class="w-1/6 text-right">
                        <div> {{ forecast.max_temp }} </div>
                        <div> {{ forecast.min_temp }} </div>
                    </div>
                </div>

            </div>
            <!-- forecast-weather -->
        </div>
        <!-- weather-container -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            current_weather: {
                now_temprature: Number,
                feelslike: String,
                description: String,
                location: String,
                icon: String
            },
            daily_forecast_data: [],
            location: {
                lat: '16.8409',
                lon: '96.1735'
            }
        }
    },
    mounted() {
        this.fetchData()
    },
    methods: {
        fetchData() {
            fetch(`/api/weather?lat=${this.location.lat}&lon=${this.location.lon}`).then(response => response.json() )
            .then((responseJson) => {
                this.addCurrnetData(responseJson);
            })
        },
        addCurrnetData(data) {    

            let current_weather = this.current_weather;
            current_weather.now_temprature = `${data.current.temp}°C`;
            current_weather.feelslike = `${data.current.feels_like}°C`;
            current_weather.description = data.current.weather[0].description;
            current_weather.location = `${ data.timezone.split('/')[1] }`;
            current_weather.icon = `http://openweathermap.org/img/w/${data.current.weather[0].icon}.png`;

            this.addForecastData(data.daily);

        },
        addForecastData(daily_data) {

            daily_data = daily_data.filter((data, index) => {
                return index < 5;
            });              // cannot limit api bcuz of unpaid version

            this.daily_forecast_data = daily_data.map(data => {
                
                return {
                    'day': this.toDayOfWeek(data.dt),
                    'icon':`http://openweathermap.org/img/w/${data.weather[0].icon}.png`,
                    'description': data.weather[0].description,
                    'max_temp': `${data.temp.max}°C`,
                    'min_temp': `${data.temp.min}°C`
                };

            })

        },

        toDayOfWeek(unix_timestamp) {
            let new_day = new Date(unix_timestamp * 1000);
            const day_texts = [ 'Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun' ];
            return day_texts[new_day.getDay()];
        }
    }
}
</script>
