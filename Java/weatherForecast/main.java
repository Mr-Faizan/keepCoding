
public class Main {
    public static void main(String[] args) {
        int[][] dayRainfall = new int[][] {
                { -10, 22, 33, 19, 45, 75, 20 },
                { 35, -6, 57, 8, 10, -100, 10 },
                { 15, 20, 29, 39, 30, 75, 20 }
        };

        String[] weatherDescriptions = { "sunny", "rainy", "thunderstorm", "sunny", "sunny", "thunderstorm", "sunny" };

        Rainfall rainfall = new Rainfall(dayRainfall, weatherDescriptions);
        int[][] dailyRainfall = rainfall.dataPreparation();

        int totalRainfall = rainfall.totalRainfall();

        String trend = rainfall.trend(2);

        System.out.println("dataPreparation : ");
        printWeather(dailyRainfall);
        System.out.println("totalRainfall : ");
        System.out.println(totalRainfall);
        System.out.println("trend : ");
        System.out.println(trend);

    }
    
    
    public static void printWeather(int totalRainfall[][]) {
        // Loop through all rows
        for (int i = 0; i < totalRainfall.length; i++) {

            // Loop through all elements of current row
            for (int j = 0; j < totalRainfall[i].length; j++)
                System.out.print(totalRainfall[i][j] + " ");

            System.out.println(" ");
        }
    }


}
