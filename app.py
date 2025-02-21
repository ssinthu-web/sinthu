from flask import Flask, render_template, request, redirect, url_for, flash
import sqlite3

app = Flask(__name__)
app.secret_key = 'your_secret_key'

# Database initialization
def init_db():
    conn = sqlite3.connect('database.db')
    c = conn.cursor()
    c.execute('''CREATE TABLE IF NOT EXISTS users (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    username TEXT NOT NULL,
                    password TEXT NOT NULL
                )''')
    c.execute('''CREATE TABLE IF NOT EXISTS appointments (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    user_id INTEGER,
                    date TEXT NOT NULL,
                    time TEXT NOT NULL,
                    doctor_name TEXT NOT NULL,
                    FOREIGN KEY (user_id) REFERENCES users (id)
                )''')
    conn.commit()
    conn.close()

# Home page
@app.route('/')
def index():
    return render_template('index.html')

# User registration
@app.route('/register', methods=['GET', 'POST'])
def register():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']

        conn = sqlite3.connect('database.db')
        c = conn.cursor()
        c.execute("INSERT INTO users (username, password) VALUES (?, ?)", (username, password))
        conn.commit()
        conn.close()

        flash('Registration successful! Please login.')
        return redirect(url_for('login'))

    return render_template('register.html')

# User login
@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']

        conn = sqlite3.connect('database.db')
        c = conn.cursor()
        c.execute("SELECT * FROM users WHERE username = ? AND password = ?", (username, password))
        user = c.fetchone()
        conn.close()

        if user:
            return redirect(url_for('dashboard', user_id=user[0]))
        else:
            flash('Invalid username or password.')
            return redirect(url_for('login'))

    return render_template('login.html')

# User dashboard
@app.route('/dashboard/<int:user_id>')
def dashboard(user_id):
    conn = sqlite3.connect('database.db')
    c = conn.cursor()
    c.execute("SELECT * FROM appointments WHERE user_id = ?", (user_id,))
    appointments = c.fetchall()
    conn.close()
    return render_template('dashboard.html', user_id=user_id, appointments=appointments)

# Book appointment
@app.route('/book_appointment/<int:user_id>', methods=['GET', 'POST'])
def book_appointment(user_id):
    if request.method == 'POST':
        date = request.form['date']
        time = request.form['time']
        doctor_name = request.form['doctor_name']

        conn = sqlite3.connect('database.db')
        c = conn.cursor()
        c.execute("INSERT INTO appointments (user_id, date, time, doctor_name) VALUES (?, ?, ?, ?)",
                  (user_id, date, time, doctor_name))
        conn.commit()
        conn.close()

        flash('Appointment booked successfully!')
        return redirect(url_for('dashboard', user_id=user_id))

    return render_template('book_appointment.html', user_id=user_id)

if __name__ == '__main__':
    init_db()
    app.run(debug=True)