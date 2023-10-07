// Connect to MongoDB
conn = new Mongo();
db = conn.getDB("SpeechCraftDB");

// Create collections
db.createCollection("users");
db.createCollection("word_banks");
db.createCollection("lookup_stats");
db.createCollection("activity_logs");
db.createCollection("acquisition_metrics");

print("Collections created successfully.");

// Sample data insertion for demonstration purposes

// Insert sample user
db.users.insert({
    "username": "user123",
    "email": "user123@email.com",
    "joined_date": new Date()
});

// Insert sample word bank entry
db.word_banks.insert({
    "word": "example",
    "definitions": ["a representative form or pattern", "a typical case"],
    "translations": {
        "spanish": "ejemplo",
        "french": "exemple"
    }
});

// Insert sample lookup stats
db.lookup_stats.insert({
    "user_id": db.users.findOne()._id,
    "word_id": db.word_banks.findOne()._id,
    "lookup_type": "definition",
    "timestamp": new Date()
});

// Insert sample activity log
db.activity_logs.insert({
    "user_id": db.users.findOne()._id,
    "activity_type": "lesson_completed",
    "timestamp": new Date()
});

// Insert sample acquisition metrics
db.acquisition_metrics.insert({
    "user_id": db.users.findOne()._id,
    "word_id": db.word_banks.findOne()._id,
    "retention_score": 85,
    "correctness_score": 90,
    "last_updated": new Date()
});

print("Sample data inserted successfully.");
