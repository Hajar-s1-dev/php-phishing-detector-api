<?php

// The class that will analyze the URL and return a risk score based on certain features
class PhishingDetector {
    // Function to analyze the URL and return a risk score
    public function analyzeUrl($url) {
        $parsed = parse_url($url);
        
        // I7tiyat: ila parse_url m9rach l-host s7i7, n-khdmo b l-url kamel f l-ba7t
        $host = $parsed['host'] ?? '';
        if (empty($host)) {
            $host = $url; 
        }
        
        // 1. Extract dynamic features
        $features = [
            'length' => strlen($url),
            'dot_count' => substr_count($host, '.'),
            'has_dash' => str_contains($host, '-') ? 1 : 0,
            'has_at' => str_contains($url, '@') ? 1 : 0,
            'is_https' => ($parsed['scheme'] ?? '') === 'https' ? 1 : 0
        ];

        // 2. Calculate a risk score based on the features
        $score = 0;
        if ($features['length'] > 50) $score += 20; 
        if ($features['dot_count'] >= 3) $score += 25;
        if ($features['has_dash']) $score += 25;
        if ($features['has_at']) $score += 35; 
        if (!$features['is_https']) $score += 25; 
        //  Smart Check: 
        $suspicious_keywords = ['paypal', 'signin', 'login', 'verification', 'secure', 'account'];
        foreach ($suspicious_keywords as $keyword) {
            if (str_contains(strtolower($url), $keyword)) {
                $score += 20; 
            }
        }

        // Final score restriction
        $final_score = min($score, 100);

        return [
            'metrics' => $features,
            'risk_score' => $final_score . '%',
            'verdict' => $final_score >= 50 ? 'Phishing' : 'Safe'
        ];
    }
}
?>