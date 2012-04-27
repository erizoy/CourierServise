using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace WindowsFormsApplication1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
           string CommandText = "Наш SQL скрипт";
            string Connect = "Database=courier614;Data Source=sql-4.radyx.ru;User Id=courier614;Password=swki6qr256";
            //Переменная Connect - это строка подключения в которой:
            //БАЗА - Имя базы в MySQL
            //ХОСТ - Имя или IP-адрес сервера (если локально то можно и localhost)
            //ПОЛЬЗОВАТЕЛЬ - Имя пользователя MySQL
            //ПАРОЛЬ - говорит само за себя - пароль пользователя БД MySQL
            MySqlConnection myConnection = new MySqlConnection(Connect);
            MySqlCommand myCommand = new MySqlCommand(CommandText, myConnection);
            myConnection.Open(); //Устанавливаем соединение с базой данных.
            //Что то делаем...
            
            MySqlDataReader MyDataReader;
            MyDataReader = myCommand.ExecuteReader();

            while (MyDataReader.Read())
            {
                string result = MyDataReader.GetString(0); //Получаем строку
                int id = MyDataReader.GetInt32(1); //Получаем целое число
            }
            MyDataReader.Close();
            myConnection.Close(); //Обязательно закрываем соединение!
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Close();
        }
    }
}
