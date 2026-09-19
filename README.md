# 🛡️ HTTP URL Phishing Detection API
A lightweight, high-performance **Pure PHP REST API** that analyzes URLs and estimates their phishing risk using multiple heuristic security checks.
The project is built without any PHP framework, following a simple MVC-inspired architecture for speed, maintainability, and easy deployment.

# 📌 Features

- ✅ Pure PHP (No Framework)
- ✅ REST API Architecture
- ✅ MVC-inspired Project Structure
- ✅ Native JSON Request Parsing
- ✅ Multi-Factor URL Risk Analysis
- ✅ HTTP/HTTPS Protocol Validation
- ✅ Domain Structure Inspection
- ✅ URL Length Analysis
- ✅ Suspicious Keyword Detection
- ✅ Risk Percentage Calculation
- ✅ JSON Response Format
- ✅ Lightweight and Fast

---


# ⚙️ Technologies Used

- PHP 8+
- REST API
- JSON
- MVC-inspired Architecture

---

# 🚀 Installation

Clone the repository

```bash
git clone https://github.com/Hajar-s1-dev/php-phishing-detector-api.git
```

Go to the project directory

```bash
cd php-phishing-detector-api
```

Start the local server

```bash
php -S localhost:8000
```

The API will be available at

```
http://localhost:8000
```

---

# 📡 API Endpoint

### POST /

Request

```json
{
    "url": "https://paypal-login-security.com"
}
```

---

# ✅ Example Response

```json
{
    "status": "Phishing",
    "risk": 87,
    "protocol": "HTTPS",
    "length": 34,
    "keywords": [
        "paypal",
        "login",
        "security"
    ]
}
```

---

# 🔍 Detection Criteria

The API evaluates several security indicators, including:

- URL Length
- Number of Dots
- Number of Hyphens
- HTTP vs HTTPS
- Suspicious Keywords
- Domain Structure
- Risk Score Calculation

---

# 🏗️ Architecture

The application follows a lightweight MVC-inspired structure.

```
Client
   │
   ▼
index.php
   │
   ▼
Controller
   │
   ▼
Phishing Detection Logic
   │
   ▼
JSON Response
```
# 💡 Future Improvements

- Domain Reputation Check
- WHOIS Lookup
- Blacklist Integration
- Machine Learning Detection
- DNS Verification
- SSL Certificate Validation



Computer Science Student | PHP Backend Developer | REST API Enthusiast
