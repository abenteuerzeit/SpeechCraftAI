-- Seed Users Table
INSERT INTO users (username, email, password_hash, first_name, last_name) VALUES 
('alice123', 'alice@email.com', 'hashed_password_1', 'Alice', 'Smith'),
('bob456', 'bob@email.com', 'hashed_password_2', 'Bob', 'Johnson'),
('carol789', 'carol@email.com', 'hashed_password_3', 'Carol', 'Williams');

-- Seed Curriculum Table
INSERT INTO curriculum (title, description) VALUES 
('Introduction to SpeechCraft', 'The basics of SpeechCraft and its components.'),
('Advanced SpeechCraft Techniques', 'Deep dive into advanced topics of SpeechCraft.');

-- Seed AI Prompts Table
INSERT INTO ai_prompts (prompt_text, curriculum_id) VALUES 
('Describe the basics of SpeechCraft.', 1),
('What are the advanced techniques in SpeechCraft?', 2);

-- Seed User Progress Table
INSERT INTO user_progress (user_id, curriculum_id, last_prompt_id, progress_percentage) VALUES 
(1, 1, 1, 50.00),
(2, 2, 2, 25.00),
(3, 1, NULL, 0.00);

-- Seed AI Generated Content Table
INSERT INTO ai_generated_content (user_id, prompt_id, generated_text) VALUES 
(1, 1, 'SpeechCraft is a platform that combines the power of AI with traditional learning techniques.'),
(2, 2, 'Advanced techniques in SpeechCraft include AI-assisted content generation and personalized learning paths.');

-- Seed Azure Files Table
INSERT INTO azure_files (file_name, file_type, azure_url, associated_content_id) VALUES 
('intro_speechcraft.mp3', 'audio', 'https://azure.blob/storage/intro_speechcraft.mp3', 1),
('advanced_techniques.mp3', 'audio', 'https://azure.blob/storage/advanced_techniques.mp3', 2);
