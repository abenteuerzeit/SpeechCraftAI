-- Users Table
CREATE TABLE users (
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    date_joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP
);

-- Curriculum Table
CREATE TABLE curriculum (
    curriculum_id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- AI Prompts Table
CREATE TABLE ai_prompts (
    prompt_id SERIAL PRIMARY KEY,
    prompt_text TEXT NOT NULL,
    curriculum_id INT REFERENCES curriculum(curriculum_id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- User Progress Table
CREATE TABLE user_progress (
    progress_id SERIAL PRIMARY KEY,
    user_id INT REFERENCES users(user_id),
    curriculum_id INT REFERENCES curriculum(curriculum_id),
    last_prompt_id INT REFERENCES ai_prompts(prompt_id),
    progress_percentage DECIMAL(5,2) CHECK (progress_percentage BETWEEN 0 AND 100),
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- AI Generated Content Table
CREATE TABLE ai_generated_content (
    content_id SERIAL PRIMARY KEY,
    user_id INT REFERENCES users(user_id),
    prompt_id INT REFERENCES ai_prompts(prompt_id),
    generated_text TEXT NOT NULL,
    generated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Azure Files Table
CREATE TABLE azure_files (
    file_id SERIAL PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_type VARCHAR(50),  -- e.g., 'text-to-speech', 'audio'
    azure_url TEXT NOT NULL,
    associated_content_id INT REFERENCES ai_generated_content(content_id),
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
