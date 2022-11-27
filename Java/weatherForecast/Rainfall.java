import java.util.Objects;

// Rainfall class contins all the logic of WeatherForcast.
public class Rainfall {
    // Defining possible enums for weather description.
    static final String SUNNY = "sunny", RAINY = "rainy", THUNDERSTORM = "thunderstorm";

    // dayRainfall contains Rainfall data from n weather stations over n days
    private int[][] dayRainfall;

    // weatherDescription contains Weather descriptors for the corresponding n days
    private String[] weatherDescription;

    // Constructor of Rainfall
    public Rainfall(int[][] dayRainfall, String[] weatherDescription) {
        this.dayRainfall = dayRainfall;
        this.weatherDescription = weatherDescription;
    }

    /*
    dataPreparation processes the data that has been stored in the class. 
    @return a two-dimensional int array with the correctly processed data.
    */
    public int[][] dataPreparation() {

        try {
            int totalDays = dayRainfall[0].length;
            int totalStations = dayRainfall.length;

            // This for loop will iterates on the number of rows for different stations.
            for (int i = 0; i < totalDays; i++) {
                // This for loop will iterates on the number of columns for each day.
                for (int j = 0; j < totalStations; j++) {

                    if ((Objects.nonNull(weatherDescription[i])) && (!weatherDescription[i].equals(""))) {
                        
                        int temperature = dayRainfall[j][i];

                        switch (weatherDescription[i].toLowerCase()) {
                            case SUNNY:
                                if (temperature < 0)
                                    temperature = 0;
                                break;
                            case RAINY:
                                if (temperature < 0) {
                                    int sum = 0, count = 0;
                                    for (int k = 0; k < totalStations; k++) {
                                        if (dayRainfall[k][i] > 0) {
                                            sum += dayRainfall[k][i];
                                            count++;
                                        }
                                    }

                                    if (sum > 0 && count > 0) {
                                        // Taking average of all the stations for same day
                                        temperature = sum / count;
                                    }
                                }
                                break;
                            case THUNDERSTORM:
                                if (temperature < 0)
                                    temperature = Math.abs(temperature);
                                break;
                            default:
                                System.out.println("Invalid Weather Description");
                                break;
                        }
                        dayRainfall[j][i] = temperature;
                    }
                }
            }
            return dayRainfall;
        } catch (Exception e) {
            System.out.println("Some exception has occured in dataPreparation method.");
            return dayRainfall;
        }
    }

    /*
    totalRainfall method calculates the total rainfall measured by all weather stations over all days.
    @return the result as an int value.
    */
    public int totalRainfall() {
        int totalRainfall = 0;
        try {
            
            if (dayRainfall.length > 0) {
                
                // Taking the sum of whole matrics by using two for loop.
                for (int i = 0; i < dayRainfall.length; i++) {
                    for (int j = 0; j < dayRainfall[i].length; j++) {
                        totalRainfall += dayRainfall[i][j];
                    }
                }
            }

            return totalRainfall;

        }
        // handling the exception
        catch (ArithmeticException e) {
            System.out.println(e);
            return totalRainfall;
        }
    }

    /*
    trend function will forecast what the weather on the next day will be like, 
    depending on the average rainfall per station and day of the past n days.
    @input int value n
    @return a weather descriptor as a String.
    */
    public String trend(int n) {

        try {
            // Handling invalid inputs
            if (n < 1 || n > dayRainfall[0].length || dayRainfall.length < 1) {
                return "Invalid Input";
            }

            int average, sum = 0, count = 0;

            // Calculating the sum of last n number of days for all the stations.
            for (int i = 0; i < dayRainfall.length; i++) {
                int j = dayRainfall[0].length - n;
                for (; j < dayRainfall[i].length; j++) {
                    sum += dayRainfall[i][j];
                    count++;
                }
            }

            // Calculating average
            average = sum / count;

            // Handling all three scenarios in one statement.
            return average < 50 ? SUNNY : average == 75 ? THUNDERSTORM : RAINY;

        }
        // handling the exception
        catch (ArithmeticException e) {
            System.out.println(e);
            return "Exception occured";
        }
    }

}
