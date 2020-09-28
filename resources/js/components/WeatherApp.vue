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
                        <div class="font-semibold"> {{ current_weather.short_description }} </div>
                        <div> {{ current_weather.location }} </div>
                    </div>
                </div>
                <div>
                    icon
                </div>
            </div>
            <!-- current-weather -->
            
            <!-- future-weather -->
            <div class="future-weather text-sm bg-gray-800 px-6 py-8 overflow-hidden">

                <div class="flex items-center">
                    <div class="w-1/6 text-gray-200"> MON </div>
                    <div class="w-4/6 px-4 flex items-center"> 
                        <div> icon </div>
                        <div class="ml-3"> Cloudy with a chance of showers </div>
                    </div>
                    <div class="w-1/6 text-right">
                        <div> 5°C</div>
                        <div> -2°C</div>
                    </div>
                </div>

                <div class="flex items-center mt-8">
                    <div class="w-1/6 text-gray-200"> MON </div>
                    <div class="w-4/6 px-4 flex items-center"> 
                        <div> icon </div>
                        <div class="ml-3"> Cloudy with a chance of showers </div>
                    </div>
                    <div class="w-1/6 text-right">
                        <div> 5°C</div>
                        <div> -2°C</div>
                    </div>
                </div>

                <div class="flex items-center mt-8">
                    <div class="w-1/6 text-gray-200"> MON </div>
                    <div class="w-4/6 px-4 flex items-center"> 
                        <div> icon </div>
                        <div class="ml-3"> Cloudy with a chance of showers </div>
                    </div>
                    <div class="w-1/6 text-right">
                        <div> 5°C</div>
                        <div> -2°C</div>
                    </div>
                </div>

                <div class="flex items-center mt-8">
                    <div class="w-1/6 text-gray-200"> MON </div>
                    <div class="w-4/6 px-4 flex items-center"> 
                        <div> icon </div>
                        <div class="ml-3"> Cloudy with a chance of showers </div>
                    </div>
                    <div class="w-1/6 text-right">
                        <div> 5°C</div>
                        <div> -2°C</div>
                    </div>
                </div>

            </div>
            <!-- future-weather -->
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
                short_description: String,
                location: String
            },
            location: {
                'name': 'Yangon'
            }
        }
    },
    mounted() {
        this.fetchData()
    },
    methods: {
        fetchData() {
            fetch(`/api/weather?locationName=${this.location.name}`).then(response => response.json() )
            .then(data => this.addCurrnetData(data));
        },
        addCurrnetData(data) {      
            console.log(data);
            let current_weather = this.current_weather;
            current_weather.now_temprature = `${data.current.temperature}°C`;
            current_weather.feelslike = `${data.current.feelslike}°C`;
            current_weather.short_description = data.current.weather_descriptions[0];
            current_weather.location = `${data.location.name},${data.location.country}`;
        }
    }
}
</script>
