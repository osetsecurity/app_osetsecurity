from flask import Flask, render_template, request
import requests

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/submit', methods=['POST'])
def submit():
    if request.method == 'POST':
        email = request.form['email']
        breaches = get_breaches(email)
        if breaches is not None:
            return render_template('submit.html', email=email, breaches=breaches)
        else:
            message = f"{email} ile ilişkilendirilmiş bir ihlal bulunamadı."
            return render_template('no_breaches.html', message=message)

def get_breaches(email):
    api_key = ""  # HIBP API anahtarı
    url = f"https://haveibeenpwned.com/api/v3/breachedaccount/{email}"
    headers = {"hibp-api-key": api_key}
    response = requests.get(url, headers=headers)
    
    if response.status_code == 200:
        breaches = response.json()
        if len(breaches) > 0:
            return breaches
        else:
            return None  # Belirli bir e-posta adresi ile ilişkilendirilmiş ihlal yok
    elif response.status_code == 404:
        return None  # Belirli bir e-posta adresi ile ilişkilendirilmiş ihlal yok
    else:
        print("Hata! İstek başarısız oldu.")
        return None

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0')