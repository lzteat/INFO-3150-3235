import java.sql.*;

public class MysqlCon {

	public static void main(String[] args) {
		String url = "jdbc:mysql://tpc2017.cnd231jurlnn.us-west-2.rds.amazonaws.com:3306/info3150";
		String username = "admintpc";
		String password = "3lmerfudd";

		System.out.println("Connecting database...");

		try (Connection connection = DriverManager.getConnection(url, username, password)) 
		{
		    System.out.println("Database connected!");
		}
		catch (SQLException e) 
		{
		    throw new IllegalStateException("Cannot connect the database!", e);
		}
	}

}
