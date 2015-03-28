import os
from flask import Flask, render_template, request

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/home', methods=['GET'])
def about():
    return render_template('home.html')

@app.route('/findBet', methods=['GET'])
def findBet():
    return render_template('findBet.html')

if __name__=='__main__':
    port = int(os.environ.get("PORT", 3000))
    app.run(host='0.0.0.0',port=port)
